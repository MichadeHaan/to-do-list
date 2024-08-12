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

// Check if description is not empty
if (empty($data['description'])) {
    echo json_encode(['success' => false, 'error' => 'Description cannot be empty']);
    exit;
}

// Voeg de taak toe aan de database
$sql = "INSERT INTO tasks (description) VALUES (:description)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':description', $data['description']);
$stmt->execute();

// Haal het ID van de toegevoegde taak op
$task_id = $conn->lastInsertId();

// Geef de taak terug aan de client
echo json_encode(['success' => true, 'task' => ['id' => $task_id, 'description' => $data['description']]]);
?>