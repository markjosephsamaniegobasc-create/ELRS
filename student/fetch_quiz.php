<?php
session_start();
header('Content-Type: application/json');
require_once('../conn.php');

$student_number = $_SESSION['student_number'] ?? null;
$course = $_GET['course'] ?? '';
$subject = $_GET['subject_name'] ?? '';

if (!$student_number || $course === '' || $subject === '') {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
  exit;
}

$today = date('Y-m-d');
$checkStmt = $conn->prepare("
    SELECT COUNT(*) AS attempts
    FROM quiz_result
    WHERE student_number = ? 
      AND subject_name = ? 
      AND DATE(date) = ?
");
$checkStmt->bind_param("sss", $student_number, $subject, $today);
$checkStmt->execute();
$checkResult = $checkStmt->get_result()->fetch_assoc();

if ($checkResult['attempts'] > 0) {
  echo json_encode([
    'success' => false,
    'message' => 'You have already taken this quiz today. Try again tomorrow.'
  ]);
  exit;
}

$stmt = $conn->prepare("
    SELECT q.quizid, q.question, q.option1, q.option2, q.option3, q.option4, q.answer, s.timer
    FROM quiz q
    JOIN subject s 
      ON q.subject_name = s.subject_name 
     AND q.course = s.course
    WHERE q.course = ? 
      AND q.subject_name = ? 
      AND q.checkQuestion = 'selected'
    ORDER BY RAND()
");
$stmt->bind_param('ss', $course, $subject);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
$timer = null;

while ($row = $result->fetch_assoc()) {
  if ($timer === null && isset($row['timer'])) {
    $timer = (int) $row['timer'];
  }

  $questions[] = [
    'quizid' => (int) $row['quizid'],
    'question' => (string) $row['question'],
    'option1' => (string) $row['option1'],
    'option2' => (string) $row['option2'],
    'option3' => (string) $row['option3'],
    'option4' => (string) $row['option4'],
    'answer' => (string) $row['answer'],
  ];
}

$timerQuery = $conn->prepare("SELECT timer FROM subject WHERE subject_name = ? AND course = ? LIMIT 1");
$timerQuery->bind_param("ss", $subject, $course);
$timerQuery->execute();
$timerResult = $timerQuery->get_result();
$timerRow = $timerResult->fetch_assoc();
$timer = $timerRow['timer'] ?? 0;

echo json_encode([
  'success' => true,
  'subject_name' => $subject,
  'timer' => (int) $timer,
  'count' => count($questions),
  'questions' => $questions
]);