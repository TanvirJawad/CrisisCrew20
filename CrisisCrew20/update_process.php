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

// Prepare statement to update volunteer information including skills
$query = "UPDATE volunteers SET firstName=?, lastName=?, email=?, contact=?, password=?, address=?, location=?, skills=? WHERE username=?";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("sssssssss", $firstName, $lastName, $email, $contact, $password, $address, $location, $skills, $username);

// Set parameters from the form fields
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$password = mysqli_real_escape_string($conn, $_POST['password']); // Consider hashing the password
$address = mysqli_real_escape_string($conn, $_POST['address']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

// Check if 'skills' checkbox array is set
if (isset($_POST['skills']) && is_array($_POST['skills'])) {
    // Combine selected skills into a comma-separated string
    $skills = implode(', ', $_POST['skills']);
} else {
    $skills = ''; // No skills selected
}

if ($stmt->execute()) {
    // Redirect to the profile page on success
    header('Location:My Profile.php'); // Adjust this to your actual profile page URL
    exit();
} else {
    // Show error message and stay on the same page
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
