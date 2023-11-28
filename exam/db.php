<?php
$host = "localhost";
$dbname = "questions";
$username = "root";
$password = "root";

try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Savienojums ar datu bāzi ir izveidots!";
} catch (PDOException $e) {
	die("Kļūda savienojoties ar datu bāzi: " . $e->getMessage());
}
?>
