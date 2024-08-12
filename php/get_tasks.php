<?php
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id, description, completed FROM tasks";
$stmt = $conn->prepare($sql);
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tasks);
?>