<?php
include('../conn.php');

$course = $_GET['course'] ?? '';
?>
<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()">
    <i class="fa-solid fa-arrow-left"></i> Main Page
  </button>
</div>

<div class="container">
  <h5 class="mb-3">Quiz</h5>

  <div class="card">
    <div class="card-body">
      <div class="row g-3">
        <?php
        $res = $conn->prepare("SELECT subject_name FROM subject WHERE course = ? AND (is_archived IS NULL OR is_archived != 'archived')");
        $res->bind_param("s", $course);
        $res->execute();
        $result = $res->get_result();

        if ($result && $result->num_rows > 0):
          while ($r = $result->fetch_assoc()):
            $subj = $r['subject_name'];
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between text-center">
                  <h6 class="mb-3"><?= htmlspecialchars($subj) ?></h6>
                  <button class="btn btn-primary take-quiz-btn" data-subject="<?= htmlspecialchars($subj, ENT_QUOTES) ?>"
                    data-course="<?= htmlspecialchars($course, ENT_QUOTES) ?>" data-bs-toggle="modal"
                    data-bs-target="#quizModal">
                    Take Quiz
                  </button>
                </div>
              </div>
            </div>
            <?php
          endwhile;
        else:
          ?>
          <p class="text-center mb-0">No quiz data found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <span id="quizSubject">Subject</span>
          <small class="text-muted ms-2" id="quizProgress">0/0</small>
        </h5>
        <span id="quizTimer" class="ms-3 fw-bold text-danger">30s</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div id="quizBody">
          <p id="quizQuestion" class="fw-semibold mb-3">Loading...</p>
          <div id="quizOptions"></div>
        </div>

        <div id="quizResult" class="text-center d-none">
          <h4 class="mb-3">Your score</h4>
          <div class="display-6"><span id="quizScore">0</span></div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" id="backBtn" class="btn btn-secondary d-none">Back</button>
        <button type="button" id="nextBtn" class="btn btn-primary">Next</button>
        <button type="button" id="submitBtn" class="btn btn-success d-none">Submit</button>
      </div>

    </div>
  </div>
</div>