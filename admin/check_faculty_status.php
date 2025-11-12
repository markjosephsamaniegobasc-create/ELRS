<?php
include('../conn.php');

$sql = "SELECT email, lastname, middlename, firstname, is_enabled FROM faculty";
$result = mysqli_query($conn, $sql);

function getEnabledClass($is_enabled)
{
  return match ($is_enabled) {
    'enabled' => 'btn-success',
    'disabled' => 'btn-danger',
    default => 'btn-secondary',
  };
}
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()">
    <i class="fa-solid fa-arrow-left"></i> Main Page
  </button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Check Faculty Status</h5>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['firstname']) ?></td>
                <td><?= htmlspecialchars($row['middlename']) ?></td>
                <td><?= htmlspecialchars($row['lastname']) ?></td>

                <td class="text-center align-middle">
                  <div class="btn-group status-dropdown" data-email="<?= htmlspecialchars($row['email']) ?>">
                    <button type="button" class="btn btn-sm dropdown-toggle <?= getEnabledClass($row['is_enabled']) ?>"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <?= ucfirst($row['is_enabled']) ?>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#" data-status="enabled">Enabled</a></li>
                      <li><a class="dropdown-item" href="#" data-status="disabled">Disabled</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">No faculty data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>