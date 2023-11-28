<?php
$pdo = new PDO("mysql:host=localhost;dbname=questions;charset=utf8", "root", "root");

$question_text = $_POST['question_text'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$correct_answer = $_POST['correct_answer'];

$stmt = $pdo->prepare("INSERT INTO questions (text) VALUES (?)");
$stmt->execute([$question_text]);
$question_id = $pdo->lastInsertId();

$stmt = $pdo->prepare("INSERT INTO answers (text, question_id, is_correct) VALUES (?, ?, ?)");
$stmt->execute([$answer1, $question_id, ($correct_answer == 1) ? 1 : 0]);
$stmt->execute([$answer2, $question_id, ($correct_answer == 2) ? 1 : 0]);

header("Location: index.php");
exit();
?>
