<html>
<head>
	<title>Izveidot jautājumu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Izveidot jaunu jautājumu</h1>

	<form action="process_create.php" method="post">
		<label for="question_text">Jautājuma teksts:</label>
		<input type="text" name="question_text" required>

		<label for="answer1">Atbilde 1:</label>
		<input type="text" name="answer1" required>

		<label for="answer2">Atbilde 2:</label>
		<input type="text" name="answer2" required>

		<label for="correct_answer">Pareizā atbilde (1 vai 2):</label>
		<input type="number" name="correct_answer" min="1" max="2" required>

		<input type="submit" value="Izveidot jautājumu">
	</form>

</body>
</html>
