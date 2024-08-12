<?php
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['description'])) {
    echo json_encode(['success' => false, 'error' => 'Description cannot be empty']);
    exit;
}

$sql = "INSERT INTO tasks (description) VALUES (:description)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':description', $data['description']);
$stmt->execute();

$task_id = $conn->lastInsertId();

echo json_encode(['success' => true, 'task' => ['id' => $task_id, 'description' => $data['description']]]);
?>