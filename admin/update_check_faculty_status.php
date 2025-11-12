<?php
include('../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $is_enabled = $_POST['is_enabled'];

    $stmt = $conn->prepare("UPDATE faculty SET is_enabled = ? WHERE email = ?");
    $stmt->bind_param("ss", $is_enabled, $email);

    if ($stmt->execute()) {
        echo "Access updated.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();