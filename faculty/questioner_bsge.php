<?php
include('../conn.php');

$countSelected = 0;
$countQuery = $conn->query("SELECT COUNT(*) AS total FROM quiz WHERE course='bsge' AND checkQuestion='selected'");
if ($countQuery && $row = $countQuery->fetch_assoc()) {
  $countSelected = $row['total'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['question'])) {
  header('Content-Type: application/json');

  $question = trim($_POST['question'] ?? '');
  $option1 = trim($_POST['option1'] ?? '');
  $option2 = trim($_POST['option2'] ?? '');
  $option3 = trim($_POST['option3'] ?? '');
  $option4 = trim($_POST['option4'] ?? '');
  $answer = trim($_POST['answer'] ?? '');
  $course = 'bsge';
  $subject_name = trim($_POST['subject_name'] ?? '');

  $stmt = $conn->prepare("
    INSERT INTO quiz (question, option1, option2, option3, option4, answer, course, subject_name)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  ");
  $stmt->bind_param("ssssssss", $question, $option1, $option2, $option3, $option4, $answer, $course, $subject_name);

  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Quiz successfully added.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error occurred during adding.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_quizzes'])) {
  header('Content-Type: application/json');

  $selected = $_POST['selected_quizzes'];
  if (!empty($selected)) {
    $ids = implode(',', array_map('intval', $selected));
    $query = "UPDATE quiz SET checkQuestion='selected' WHERE quizid IN ($ids)";
    $conn->query($query);
    echo json_encode(['success' => true, 'message' => 'Selected quizzes updated successfully.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'No quizzes selected.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unselected_quizzes'])) {
  header('Content-Type: application/json');

  $unselected = $_POST['unselected_quizzes'];
  if (!empty($unselected)) {
    $ids = implode(',', array_map('intval', $unselected));
    $query = "UPDATE quiz SET checkQuestion=NULL WHERE quizid IN ($ids)";
    if ($conn->query($query)) {
      echo json_encode(['success' => true, 'message' => 'Unchecked quizzes unmarked successfully.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Database update failed.']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'No quizzes to unmark.']);
  }
  exit();
}

$search = $_GET['search'] ?? '';
$result = null;

if (!empty($search)) {
  $stmt = $conn->prepare("SELECT * FROM quiz WHERE subject_name = ? AND course = 'bsge'");
  $stmt->bind_param("s", $search);
  $stmt->execute();
  $result = $stmt->get_result();
}
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()">
    <i class="fa-solid fa-arrow-left"></i> Main Page
  </button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Add Quiz</h5>

  <div class="card">
    <div class="card-body">
      <form id="QuizForm">
        <div class="mb-3">
          <label class="form-label">Question</label>
          <textarea class="form-control" name="question" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Option 1</label>
          <textarea class="form-control" name="option1" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Option 2</label>
          <textarea class="form-control" name="option2" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Option 3</label>
          <textarea class="form-control" name="option3" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Option 4</label>
          <textarea class="form-control" name="option4" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Answer</label>
          <select class="form-select" name="answer" required>
            <option value="">Select Answer</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Subject</label>
          <select name="subject_name" class="form-control" required>
            <option value="">Select Subject</option>
            <?php
            $subjRes = $conn->query("SELECT subject_name FROM subject WHERE course='bsge' AND (is_archived IS NULL OR is_archived != 'archived')");
            while ($subj = $subjRes->fetch_assoc()) {
              $selected = ($subject_name === $subj['subject_name']) ? "selected" : "";
              echo "<option value='" . htmlspecialchars($subj['subject_name']) . "' $selected>"
                . htmlspecialchars($subj['subject_name']) . "</option>";
            }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <h5 class="mb-3">Quiz List</h5>

  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <h6 class="fw-bold">Total Selected Questions:
          <span class="text-primary"><?= $countSelected ?></span>
        </h6>
      </div>

      <form id="filter-form-question-bsge" class="d-flex gap-2 mb-3">
        <select name="search" class="form-control">
          <option value="">Select Subject</option>
          <?php
          $subjRes = $conn->query("SELECT subject_name FROM subject WHERE course='bsge' AND (is_archived IS NULL OR is_archived != 'archived')");
          while ($subj = $subjRes->fetch_assoc()) {
            $selected = ($search === $subj['subject_name']) ? "selected" : "";
            echo "<option value='" . htmlspecialchars($subj['subject_name']) . "' $selected>"
              . htmlspecialchars($subj['subject_name']) . "</option>";
          }
          ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="questioner_bsge.php" id="reset-filter-question-bsge" class="btn btn-outline-secondary btn-sm">Reset</a>
      </form>

      <?php if ($result && $result->num_rows > 0): ?>
        <form id="markSelectedForm2">
          <table class="table table-bordered align-middle">
            <thead>
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Question</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
                <th>Answer</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td>
                    <input type="checkbox" class="quiz-checkbox" name="selected_quizzes[]" value="<?= $row['quizid'] ?>"
                      <?= ($row['checkQuestion'] === 'selected') ? 'checked' : '' ?>>
                  </td>
                  <td><?= htmlspecialchars($row['question']) ?></td>
                  <td>A</td>
                  <td>B</td>
                  <td>C</td>
                  <td>D</td>
                  <td>
                    <?php
                    $answerLetter = match ($row['answer']) {
                      'option1' => 'A',
                      'option2' => 'B',
                      'option3' => 'C',
                      'option4' => 'D',
                      default => ''
                    };
                    echo $answerLetter;
                    ?>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-success edit-quiz-btn" data-id="<?= $row['quizid'] ?>"
                      data-question="<?= htmlspecialchars($row['question']) ?>"
                      data-option1="<?= htmlspecialchars($row['option1']) ?>"
                      data-option2="<?= htmlspecialchars($row['option2']) ?>"
                      data-option3="<?= htmlspecialchars($row['option3']) ?>"
                      data-option4="<?= htmlspecialchars($row['option4']) ?>"
                      data-answer="<?= htmlspecialchars($row['answer']) ?>"
                      data-subject="<?= htmlspecialchars($row['subject_name']) ?>">
                      <i class="fa-solid fa-pen"></i> Edit
                    </button>
                  </td>
                </tr>
              <?php endwhile; ?>

            </tbody>
          </table>

          <button type="submit" class="btn btn-success mt-2">Mark as Selected</button>
          <button type="button" class="btn btn-danger mt-2" id="unmarkSelectedBtn1">Unmark Selected</button>
        </form>
      <?php else: ?>
        <p class="text-center">No quiz data found.</p>
      <?php endif; ?>

    </div>
  </div>
</div>

<div class="modal fade" id="editQuizModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="EditQuizForm1">
        <div class="modal-header">
          <h5 class="modal-title">Edit Quiz</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="quizid" id="editQuizId">

          <div class="mb-3">
            <label>Question</label>
            <textarea name="question" id="editQuestion" class="form-control" rows="3" required></textarea>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Option 1</label>
              <textarea name="option1" id="editOption1" class="form-control" rows="2" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label>Option 2</label>
              <textarea name="option2" id="editOption2" class="form-control" rows="2" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label>Option 3</label>
              <textarea name="option3" id="editOption3" class="form-control" rows="2" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label>Option 4</label>
              <textarea name="option4" id="editOption4" class="form-control" rows="2" required></textarea>
            </div>
          </div>

          <div class="mb-3">
            <select class="form-select" name="answer" id="editAnswer" required>
              <option value="">Select Answer</option>
              <option value="option1">Option 1</option>
              <option value="option2">Option 2</option>
              <option value="option3">Option 3</option>
              <option value="option4">Option 4</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject_name" id="editSubject" class="form-control" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>