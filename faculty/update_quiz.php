<?php
include('../conn.php');
header('Content-Type: application/json');

$quizid = $_POST['quizid'] ?? '';
$question = trim($_POST['question'] ?? '');
$option1 = trim($_POST['option1'] ?? '');
$option2 = trim($_POST['option2'] ?? '');
$option3 = trim($_POST['option3'] ?? '');
$option4 = trim($_POST['option4'] ?? '');
$answer = trim($_POST['answer'] ?? '');
$subject_name = trim($_POST['subject_name'] ?? '');

if (!$quizid) {
  echo json_encode(['success' => false, 'message' => 'Quiz ID missing.']);
  exit;
}

$stmt = $conn->prepare("
  UPDATE quiz 
  SET question=?, option1=?, option2=?, option3=?, option4=?, answer=?, subject_name=? 
  WHERE quizid=?
");
$stmt->bind_param("sssssssi", $question, $option1, $option2, $option3, $option4, $answer, $subject_name, $quizid);

if ($stmt->execute()) {
  echo json_encode(['success' => true, 'message' => 'Quiz updated successfully.']);
} else {
  echo json_encode(['success' => false, 'message' => 'Error updating quiz.']);
}
?>