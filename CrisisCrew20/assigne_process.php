<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    $servername = "localhost";
    $dbUsername = "sowadrahman";
    $dbPassword = "kikhobor";
    $dbname = "crisiscrew20"; // Change to the appropriate database name

    // Create a connection to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $id = $_POST["id"];
    $taskId = $_POST["task_id"];
    $resourceId = $_POST["resource_id"];
    $message = $_POST["message"];

    // Insert assignment into the "assignee" table
    $sql = "INSERT INTO assignee (task_id, resource_id, id, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iiis", $taskId, $resourceId, $id, $message);

    // Execute the query
    if ($stmt->execute()) {
        // Assignment successful, you can redirect to a success page
        header("Location: disaster_event.php");
        exit();
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If the form was not submitted through POST, redirect to an error page or handle accordingly
    echo "Invalid request";
}
?>
