<?php
// Connection parameters
$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20"; // Updated to the "event" database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize user inputs
$event_id = isset($_POST['event_id']) ? intval($_POST['event_id']) : 0;
$task_description = isset($_POST['task_description']) ? htmlspecialchars($_POST['task_description']) : '';
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';

// Prepare statement
$query = "INSERT INTO task_event (event_id, task_description, name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("iss", $event_id, $task_description, $name);

// Execute the statement
if ($stmt->execute()) {
    header('Location: task_management.php');
    exit(); // Ensure that no further code is executed after the redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
