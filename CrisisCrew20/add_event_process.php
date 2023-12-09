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

// Prepare statement
$query = "INSERT INTO event (name, description, location, date, address) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("sssss", $name, $description, $location, $date, $address);

// Set parameters and execute
$name = mysqli_real_escape_string($conn, $_POST['name']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$address = mysqli_real_escape_string($conn, $_POST['address']); // Added address field

if ($stmt->execute()) {
    // Redirect to a success page or perform any other actions
    header('Location: disaster_event.php'); // Redirect to a success page
    exit();
} else {
    // Show error message and stay on the same page
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
