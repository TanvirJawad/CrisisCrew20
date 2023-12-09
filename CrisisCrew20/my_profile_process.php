<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}

$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20";


// Create a new database connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL statement to fetch user data
$username = $_SESSION['username']; // Retrieve the username from session
$query = "SELECT * FROM volunteers WHERE username = ?";
if ($stmt = $conn->prepare($query)) {
    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $contact = $row['contact'];
        $address = $row['address'];
        $location = $row['location'];
        $gender = $row['gender'];
        $bloodGroup = $row['bloodGroup'];
        $DOB = $row['DOB'];
        $skills = explode(', ', $row['skills']); 
    } else {
        echo "No user found";
    }
    $stmt->close();
} else {
    echo "Error preparing the SQL statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
