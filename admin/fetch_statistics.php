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
        echo json_encode(['fully_passed' => 0, 'conditionally_passed' => 0, 'failed' => 0]);
        exit;
    }

    $sql = "SELECT student_number, subject_name, answer, answered 
            FROM quiz_result 
            WHERE DATE(date) = ? AND course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $date, $course);
    $stmt->execute();
    $result = $stmt->get_result();

    $scores = [];

    while ($row = $result->fetch_assoc()) {
        $student = $row['student_number'];
        $subject = $row['subject_name'];

        if (!isset($scores[$student][$subject])) {
            $scores[$student][$subject] = ['correct' => 0, 'total' => 0];
        }

        $scores[$student][$subject]['total']++;
        if ($row['answer'] === $row['answered']) {
            $scores[$student][$subject]['correct']++;
        }
    }

    $fully_passed = 0;
    $conditionally_passed = 0;
    $failed = 0;

    foreach ($scores as $student => $subjects) {
        $passed_subjects = 0;
        $failed_subjects = 0;

        foreach ($subjects as $subject => $data) {
            if ($data['correct'] >= ($data['total'] / 2)) {
                $passed_subjects++;
            } else {
                $failed_subjects++;
            }
        }

        if ($failed_subjects === 0 && $passed_subjects > 0) {
            $fully_passed++;
        } elseif ($passed_subjects > 0 && $failed_subjects > 0) {
            $conditionally_passed++;
        } else {
            $failed++;
        }
    }

    echo json_encode([
        'fully_passed' => $fully_passed,
        'conditionally_passed' => $conditionally_passed,
        'failed' => $failed
    ]);
}
?>