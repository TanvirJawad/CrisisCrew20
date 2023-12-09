<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Implement your logic for sending a password recovery email
    // This is a basic example; you should use a secure method to send emails

    // Placeholder response
    echo "Password recovery email sent.";

    // Close the database connection
    $conn->close();
    exit();
}
?>
