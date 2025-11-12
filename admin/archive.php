<?php
include('../conn.php');

$sql = "SELECT subject_name, course FROM subject WHERE is_archived = 'archived'";
$result = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unarchive_subject'])) {
    header('Content-Type: application/json');
    $subject_name = trim($_POST['unarchive_subject']);
    $course = $_POST['course'] ?? '';

    $stmt = $conn->prepare("UPDATE subject SET is_archived = NULL WHERE subject_name = ? AND course = ?");
    $stmt->bind_param("ss", $subject_name, $course);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Subject unarchived successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error unarchiving subject.']);
    }
    exit();
}
?>

<div class="mb-3">
    <button class="btn btn-success" onclick="location.reload()">
        <i class="fa-solid fa-arrow-left"></i> Main Page
    </button>
</div>

<div class="container mb-3">
    <h5 class="mb-3">Archive</h5>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['subject_name']) ?></td>
                                <td><?= htmlspecialchars($row['course']) ?></td>
                                <td>
                                    <button class="btn btn-success unarchive-subject"
                                        data-subject="<?= htmlspecialchars($row['subject_name']) ?>"
                                        data-course="<?= htmlspecialchars($row['course']) ?>">
                                        <i class="fa-solid fa-rotate-left"></i> Unarchive
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No subject data found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>