<?php
include('../conn.php');

$search = $_GET['search'] ?? '';

if (!empty($search)) {
  $stmt = $conn->prepare("
        SELECT subject_name, student_number, course, score
        FROM student_score
        WHERE student_number LIKE ?
    ");
  $likeSearch = "%{$search}%";
  $stmt->bind_param("s", $likeSearch);
} else {
  $stmt = $conn->prepare("
        SELECT subject_name, student_number, course, score
        FROM student_score
    ");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()"><i class="fa-solid fa-arrow-left"></i> Main Page</button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Scores</h5>

  <div class="card">
    <div class="card-body">
      <form id="filter-form-scores" class="d-flex gap-2 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Enter Student Number"
          value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="scores.php" id="reset-filter-scores" class="btn btn-outline-secondary btn-sm">Reset</a>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Subject Name</th>
            <th>Student Number</th>
            <th>Course</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['subject_name']) ?></td>
                <td><?= htmlspecialchars($row['student_number']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
                <td><?= htmlspecialchars($row['score']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center">No student data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>