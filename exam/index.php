<!-- index.php -->
<html>
<head>
	<title>Jautājumu saraksts</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Jautājumu saraksts</h1>

		<?php
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=questions;charset=utf8", "root", "root");

			$stmt = $pdo->prepare("SELECT * FROM questions");
			$stmt->execute();
			$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($questions as $question) {
				echo "<div class='question'>";
				echo "<h2>{$question['text']}</h2>";

				$stmt = $pdo->prepare("SELECT * FROM answers WHERE question_id = ?");
				$stmt->execute([$question['id']]);
				$answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo "<ul>";
				foreach ($answers as $answer) {
					$correct = ($answer['is_correct'] == 1) ? "- Pareizs" : "- Nepareizs";
					echo "<li>{$answer['text']} $correct</li>";
				}
				echo "</ul>";

				echo "</div>";
			}
		} catch (PDOException $e) {
			die("Kļūda iegūstot datus no datu bāzes: " . $e->getMessage());
		}
		?>
		<a href="create.php" class="button">Izveidot jautājumu</a>

	</div>
</body>
</html>
