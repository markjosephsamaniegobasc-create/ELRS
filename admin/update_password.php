<?php
session_start();
include('../conn.php');

header('Content-Type: application/json');

$email = $_SESSION['email'] ?? '';
$old = $_POST['old_password'] ?? '';
$new = $_POST['new_password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if (!$email || !$old || !$new || !$confirm) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit();
}

if ($new !== $confirm) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit();
}

$stmt = $conn->prepare("SELECT password FROM admin WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo json_encode(['success' => false, 'message' => 'User not found.']);
    exit();
}

$row = $result->fetch_assoc();

if ($old !== $row['password']) {
    echo json_encode(['success' => false, 'message' => 'Old password is incorrect.']);
    exit();
}

$stmt = $conn->prepare("UPDATE admin SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $new, $email);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
}
?>