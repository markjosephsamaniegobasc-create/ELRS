<?php
include('../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_number = $_POST['student_number'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE student SET status = ? WHERE student_number = ?");
    $stmt->bind_param("ss", $status, $student_number);

    if ($stmt->execute()) {
        header("Location: student_approval.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>