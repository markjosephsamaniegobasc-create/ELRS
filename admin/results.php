<?php
include('../conn.php');

$search = $_GET['search'] ?? '';

if (!empty($search)) {
  $stmt = $conn->prepare("
        SELECT subject_name, student_number, course, date, question, option1, option2, option3, option4, answer, answered
        FROM quiz_result
        WHERE student_number LIKE ?
    ");
  $likeSearch = "%{$search}%";
  $stmt->bind_param("s", $likeSearch);
} else {
  $stmt = $conn->prepare("
        SELECT subject_name, student_number, course, date, question, option1, option2, option3, option4, answer, answered
        FROM quiz_result
    ");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()"><i class="fa-solid fa-arrow-left"></i> Main Page</button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Results</h5>

  <div class="card">
    <div class="card-body">
      <form id="filter-form-results" class="d-flex gap-2 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Enter Student Number"
          value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="results.php" id="reset-filter-results" class="btn btn-outline-secondary btn-sm">Reset</a>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Subject Name</th>
            <th>Student Number</th>
            <th>Course</th>
            <th>Date</th>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Answer</th>
            <th>Answered</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['subject_name']) ?></td>
                <td><?= htmlspecialchars($row['student_number']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
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
                  <?php
                  $answeredLetter = match ($row['answered']) {
                    'option1' => 'A',
                    'option2' => 'B',
                    'option3' => 'C',
                    'option4' => 'D',
                    default => htmlspecialchars($row['answered'])
                  };
                  echo $answeredLetter;
                  ?>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="11" class="text-center">No student data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>a
    </div>
  </div>
</div>