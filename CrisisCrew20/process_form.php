<?php
// Connection parameters
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

// Prepare statement
$query = "INSERT INTO volunteers (firstName, lastName, email, contact, username, password, address, location, gender, bloodGroup, DOB, skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("ssssssssssss", $firstName, $lastName, $email, $contact, $username, $password, $address, $location, $gender, $bloodGroup, $DOB, $skills);

// Set parameters and execute
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']); // Consider hashing the password
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
$bloodGroup = mysqli_real_escape_string($conn, $_REQUEST['bloodGroup']);
$DOB = mysqli_real_escape_string($conn, $_REQUEST['DOB']);
$skills = isset($_POST['skills']) ? mysqli_real_escape_string($conn, implode(', ', $_POST['skills'])) : '';

if ($stmt->execute()) {
    // Redirect to the login page on success
    header('Location: client_login.php'); // Adjust this to your actual login page URL
    exit();
} else {
    // Show error message and stay on the same page
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
