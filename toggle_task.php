<?php
// Database configuratie
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';

// Maak een nieuwe PDO connectie
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Ontvang de JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Update de taak status in de database
$sql = "UPDATE tasks SET completed = :completed WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':completed', $data['completed'], PDO::PARAM_BOOL);
$stmt->bindParam(':id', $data['id']);
$stmt->execute();

echo json_encode(['success' => true]);
?>
