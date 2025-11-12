<?php
include('../conn.php');

$search = $_GET['search'] ?? '';
$result = null;

if (!empty($search)) {
  $stmt = $conn->prepare("SELECT file_name, link, file_path 
                          FROM reviewer 
                          WHERE subject_name = ?");
  $stmt->bind_param("s", $search);
  $stmt->execute();
  $result = $stmt->get_result();
}

?>
<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()"><i class="fa-solid fa-arrow-left"></i> Main Page</button>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Reviewer</h5>

  <div class="card">
    <div class="card-body">
      <form id="filter-form-subject-bsge" class="d-flex gap-2 mb-3">
        <select name="search" class="form-control">
          <option value="">Select Subject</option>
          <?php
          $subjRes = $conn->query("SELECT subject_name FROM subject WHERE course='bsaben' AND (is_archived IS NULL OR is_archived != 'archived')");
          while ($subj = $subjRes->fetch_assoc()) {
            $selected = ($search === $subj['subject_name']) ? "selected" : "";
            echo "<option value='" . htmlspecialchars($subj['subject_name']) . "' $selected>"
              . htmlspecialchars($subj['subject_name']) . "</option>";
          }
          ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="reviewer_bsaben.php" id="reset-filter-subject-bsaben" class="btn btn-outline-secondary btn-sm">Reset</a>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>File Name</th>
            <th>Link</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php if (!empty($row['file_path']) && !empty($row['file_name'])): ?>
                    <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank">
                      <?= htmlspecialchars($row['file_name']) ?>
                    </a>
                  <?php else: ?>
                    <span class="text-muted">Null</span>
                  <?php endif; ?>
                </td>

                <td>
                  <?php if (!empty($row['link'])): ?>
                    <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank">
                      <?= htmlspecialchars($row['link']) ?>
                    </a>
                  <?php else: ?>
                    <span class="text-muted">Null</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="2" class="text-center">No reviewer data found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>