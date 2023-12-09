<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the username you want to delete
    $usernameToDelete = $_POST["username"];

    $servername = "localhost";
    $dbUsername = "sowadrahman";
    $dbPassword = "kikhobor";
    $dbname = "crisiscrew20";

    // Create a connection to the database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL DELETE statement
    $sql = "DELETE FROM volunteers WHERE username = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the username parameter
    $stmt->bind_param("s", $usernameToDelete);

    // Execute the DELETE statement
    if ($stmt->execute()) {
        // Redirect to the admin dashboard upon successful deletion
        header("Location: admin_dashboard.php");
        exit(); // Terminate the script to ensure the redirection takes effect
    } else {
        echo "Error deleting volunteer: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle form submission method other than POST (e.g., GET)
    echo "Invalid request method. Please submit the form.";
}
?>
