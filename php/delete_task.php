<?php
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

$sql = "DELETE FROM tasks WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $data['id']);
$stmt->execute();

echo json_encode(['success' => true]);
?>