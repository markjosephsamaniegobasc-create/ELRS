<?php
session_start();
require_once('../conn.php');
header('Content-Type: application/json');

$student_number = $_SESSION['student_number'] ?? null;
$course = $_SESSION['course'] ?? null;

$data = json_decode(file_get_contents('php://input'), true);

$subject_name = $data['subject_name'] ?? '';
$score = $data['score'] ?? '';

if (!$student_number || !$course || !$subject_name || $score === '') {
    echo json_encode(['success' => false, 'message' => 'Missing data.']);
    exit;
}

$check = $conn->prepare("SELECT scoreid FROM student_score WHERE student_number = ? AND subject_name = ? AND course = ?");
$check->bind_param("sss", $student_number, $subject_name, $course);
$check->execute();
$existing = $check->get_result();

if ($existing->num_rows > 0) {
    $update = $conn->prepare("UPDATE student_score SET score = ? WHERE student_number = ? AND subject_name = ? AND course = ?");
    $update->bind_param("ssss", $score, $student_number, $subject_name, $course);
    $update->execute();
    echo json_encode(['success' => true, 'message' => 'Score updated successfully.']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO student_score (student_number, subject_name, course, score) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $student_number, $subject_name, $course, $score);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Score saved successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error.']);
}