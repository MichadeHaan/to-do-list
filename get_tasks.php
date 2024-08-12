<?php
// Database configuratie
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';

// Maak een nieuwe PDO connectie
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Haal alle taken op uit de database
$sql = "SELECT id, description, completed FROM tasks";
$stmt = $conn->prepare($sql);
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Stuur de taken terug naar de client in JSON-formaat
echo json_encode($tasks);
?>
