<?php
include('../conn.php');

$search = $_GET['search'] ?? '';

if (!empty($search)) {
  $stmt = $conn->prepare("
        SELECT student_number, firstname, middlename, lastname, email, course, status
        FROM student
        WHERE student_number LIKE ?
    ");
  $likeSearch = "%{$search}%";
  $stmt->bind_param("s", $likeSearch);
} else {
  $stmt = $conn->prepare("
        SELECT student_number, firstname, middlename, lastname, email, course, status
        FROM student
    ");
}

$stmt->execute();
$result = $stmt->get_result();

function getStatusClass($status)
{
  return match ($status) {
    'approved' => 'btn-success',
    'unapproved' => 'btn-warning',
    default => 'btn-secondary',
  };
}
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()"><i class="fa-solid fa-arrow-left"></i> Main Page</button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Student Approval</h5>

  <div class="card">
    <div class="card-body">
      <form id="filter-form-student-approval" class="d-flex gap-2 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Enter Student Number"
          value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="student_approval.php" id="reset-filter-student-approval"
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
            <th>Action</th>
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
                <td class="text-center align-middle">
                  <div class="btn-group status-dropdown"
                    data-student_number="<?= htmlspecialchars($row['student_number']) ?>">
                    <button type="button" class="btn btn-sm dropdown-toggle <?= getStatusClass($row['status']) ?>"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <?= ucfirst($row['status']) ?>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#" data-status="approved">approved</a></li>
                      <li><a class="dropdown-item" href="#" data-status="unapproved">unapproved</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center">No student data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>