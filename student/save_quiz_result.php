<?php
session_start();
include('../conn.php');
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$student_number = $_SESSION['student_number'];
$course = $_SESSION['course'];

$question = $data['question'] ?? '';
$option1 = $data['option1'] ?? '';
$option2 = $data['option2'] ?? '';
$option3 = $data['option3'] ?? '';
$option4 = $data['option4'] ?? '';
$answer = $data['answer'] ?? '';
$answered = $data['answered'] ?? '';
$subject_name = $data['subject_name'] ?? '';

if (!$question || !$answered || !$subject_name) {
    echo json_encode(['success' => false, 'message' => 'Missing data.']);
    exit;
}

$date = date('Y-m-d H:i:s');

$stmt = $conn->prepare("INSERT INTO quiz_result 
    (student_number, course, subject_name, question, option1, option2, option3, option4, answer, answered, date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $student_number, $course, $subject_name, $question, $option1, $option2, $option3, $option4, $answer, $answered, $date);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error.']);
}