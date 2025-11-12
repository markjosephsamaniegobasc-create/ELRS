<?php
include('../conn.php');

if (isset($_GET['date']) && isset($_GET['course'])) {
    $date = $_GET['date'];
    $course = $_GET['course'];

    $quizQuery = "SELECT COUNT(*) AS total_selected FROM quiz WHERE checkQuestion = 'selected'";
    $quizResult = $conn->query($quizQuery);
    $quizData = $quizResult->fetch_assoc();
    $total_selected = $quizData['total_selected'] ?? 0;

    if ($total_selected == 0) {
        echo json_encode(['passed' => 0, 'failed' => 0]);
        exit;
    }

    $sql = "SELECT student_number, answer, answered 
            FROM quiz_result 
            WHERE DATE(date) = ? AND course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $date, $course);
    $stmt->execute();
    $result = $stmt->get_result();

    $scores = [];

    while ($row = $result->fetch_assoc()) {
        $student = $row['student_number'];
        if (!isset($scores[$student])) {
            $scores[$student] = 0;
        }

        if ($row['answer'] === $row['answered']) {
            $scores[$student]++;
        }
    }

    $passed = 0;
    $failed = 0;

    foreach ($scores as $student => $correctCount) {
        if ($correctCount >= ($total_selected / 2)) {
            $passed++;
        } else {
            $failed++;
        }
    }

    echo json_encode(['passed' => $passed, 'failed' => $failed]);
}
?>