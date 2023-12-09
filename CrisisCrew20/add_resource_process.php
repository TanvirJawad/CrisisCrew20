<?php
// Connection parameters
$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20"; // Updated to the appropriate database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize user inputs
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$task_id = isset($_POST['task_id']) ? intval($_POST['task_id']) : 0;

// Prepare statement
$query = "INSERT INTO resource (name, description, task_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("ssi", $name, $description, $task_id);

// Execute the statement
if ($stmt->execute()) {
    header('Location: resource_management.php');
    exit(); // Ensure that no further code is executed after the redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
