<?php
include('../conn.php');

$search = $_GET['search'] ?? '';

if (!empty($search)) {
  $stmt = $conn->prepare("
        SELECT student_number, firstname, middlename, lastname, email, course, status
        FROM student
        WHERE student_number LIKE ? AND status = 'approved'
    ");
  $likeSearch = "%{$search}%";
  $stmt->bind_param("s", $likeSearch);
} else {
  $stmt = $conn->prepare("
        SELECT student_number, firstname, middlename, lastname, email, course, status
        FROM student
        WHERE status = 'approved'
    ");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()"><i class="fa-solid fa-arrow-left"></i> Main Page</button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Student Information</h5>

  <div class="card">
    <div class="card-body">
      <form id="filter-form-student-information" class="d-flex gap-2 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Enter Student Number"
          value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="student_information.php" id="reset-filter-student-information"
          class="btn btn-outline-secondary btn-sm">Reset</a>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Student Number</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Course</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['student_number']) ?></td>
                <td><?= htmlspecialchars($row['firstname']) ?></td>
                <td><?= htmlspecialchars($row['middlename']) ?></td>
                <td><?= htmlspecialchars($row['lastname']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center">No student data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>