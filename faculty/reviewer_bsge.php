<?php
include('../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subject_name'])) {
  header('Content-Type: application/json');
  $subject_name = trim($_POST['subject_name']);
  $timer = trim($_POST['timer']);
  $course = 'bsge';
  $stmt = $conn->prepare("INSERT INTO subject (subject_name, timer, course) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $subject_name, $timer, $course);
  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Subject successfully added.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error occurred during adding.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['link'])) {
  header('Content-Type: application/json');
  $subject_name = trim($_POST['select_subject']);
  $link = trim($_POST['link']);
  $course = 'bsge';
  $stmt = $conn->prepare("INSERT INTO reviewer (subject_name, link, course) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $subject_name, $link, $course);
  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Link successfully added.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error occurred during adding.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive_subject'])) {
  header('Content-Type: application/json');
  $subject_name = trim($_POST['archive_subject']);
  $course = 'bsge';

  $stmt = $conn->prepare("UPDATE subject SET is_archived = 'archived' WHERE subject_name = ? AND course = ?");
  $stmt->bind_param("ss", $subject_name, $course);

  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Subject archived successfully.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error archiving subject.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['old_subject_name'], $_POST['new_subject_name'])) {
  header('Content-Type: application/json');
  $old_subject_name = trim($_POST['old_subject_name']);
  $new_subject_name = trim($_POST['new_subject_name']);
  $course = 'bsge';

  $stmt = $conn->prepare("UPDATE subject SET subject_name = ? WHERE subject_name = ? AND course = ?");
  $stmt->bind_param("sss", $new_subject_name, $old_subject_name, $course);
  $success_subject = $stmt->execute();

  $stmt2 = $conn->prepare("UPDATE reviewer SET subject_name = ? WHERE subject_name = ? AND course = ?");
  $stmt2->bind_param("sss", $new_subject_name, $old_subject_name, $course);
  $success_reviewer = $stmt2->execute();

  if ($success_subject || $success_reviewer) {
    echo json_encode(['success' => true, 'message' => 'Subject name updated successfully.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error updating subject name.']);
  }
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['reviewerFile'])) {
  header('Content-Type: application/json');
  $subject_name = $_POST['upload_subject'] ?? '';
  $file = $_FILES['reviewerFile'];
  $course = 'bsge';
  if ($file['error'] === UPLOAD_ERR_OK) {
    $fileType = mime_content_type($file['tmp_name']);
    if ($fileType !== 'application/pdf') {
      echo json_encode(['success' => false, 'message' => 'Only PDF files are allowed.']);
      exit();
    }
    $targetDir = "../uploads/reviewers/";
    if (!is_dir($targetDir))
      mkdir($targetDir, 0777, true);
    $fileName = basename($file['name']);
    $targetPath = $targetDir . $fileName;
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
      $fileSize = $file['size'];
      $stmt = $conn->prepare("INSERT INTO reviewer (subject_name, file_name, file_path, file_size, course) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssis", $subject_name, $fileName, $targetPath, $fileSize, $course);
      if ($stmt->execute())
        echo json_encode(['success' => true, 'message' => 'PDF uploaded successfully.']);
      else
        echo json_encode(['success' => false, 'message' => 'Database error.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'File upload failed.']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Upload error.']);
  }
  exit();
}

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
  <h5 class="mb-3">Add Subject</h5>

  <div class="card">
    <div class="card-body">
      <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addsubjectModal">Add
        Subject</button>
      <form id="filter-form-subject-bsge" class="d-flex gap-2 mb-3">
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
        <a href="reviewer_bsge.php" id="reset-filter-subject-bsge" class="btn btn-outline-secondary btn-sm">Reset</a>
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

      <div class="modal fade" id="addsubjectModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="subjectForm">
              <div class="modal-header">
                <h5>Add Subject</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body"><input type="text" name="subject_name" class="form-control" placeholder="Subject"
                  required></div>
              <div class="modal-body"><input type="number" name="timer" class="form-control" placeholder="Timer"
                  required></div>
              <div class="modal-footer"><button type="submit" class="btn btn-primary">Add</button></div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editSubjectModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editSubjectForm1">
              <div class="modal-header">
                <h5>Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="old_subject_name" id="old_subject_name">
                <div class="mb-3">
                  <label for="new_subject_name" class="form-label">New Subject Name</label>
                  <input type="text" name="new_subject_name" id="new_subject_name" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="addlinkModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="linkForm">
              <div class="modal-header">
                <h5>Add Link</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="text" name="link" class="form-control mb-3" placeholder="Paste link (Optional)" required>
                <select name="select_subject" class="form-control">
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
              </div>
              <div class="modal-footer"><button type="submit" class="btn btn-primary">Add</button></div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container mb-3">
  <h5 class="mb-3">Subject</h5>

  <div class="card">
    <div class="card-body">
      <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addlinkModal">Add
        Link</button>
      <div class="row">
        <?php
        $res = $conn->query("SELECT subject_name FROM subject WHERE course='bsge' AND (is_archived IS NULL OR is_archived != 'archived')");
        if ($res && $res->num_rows > 0) {
          while ($r = $res->fetch_assoc()) {
            echo '<div class="col-sm-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                <div class="d-flex justify-content-end mb-3">
                <a class="btn btn-success edit-subject" data-subject="' . htmlspecialchars($r['subject_name']) . '">
                <i class="fa-solid fa-pencil"></i>
                </a>

                </div>
                  <h5>' . htmlspecialchars($r['subject_name']) . '</h5>
                  <form class="uploadForm" enctype="multipart/form-data">
                    <input type="hidden" name="upload_subject" value="' . htmlspecialchars($r['subject_name']) . '">
                    <input class="form-control mb-2" type="file" name="reviewerFile" accept="application/pdf" required>
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </form>
                </div>
              </div>
            </div>';
          }
        } else
          echo "<p class='text-center'>No subjects data found.</p>";
        ?>
      </div>
    </div>
  </div>
</div>