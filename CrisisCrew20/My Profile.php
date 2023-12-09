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
$dbUsername = "sowadrahman";
$dbPassword= "kikhobor";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"/>

    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css"/>

    <style>
          body {
            background-color: #f8f9fa; 
        }

        .container-fluid {
            margin-top: 20px; 
        }

        .welcome-message {
            background-color: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
    </style>
</head>
<body>
    
<div class="container-fluid">
      <div class="row">
        <nav class="col-12 col-md-3 col-lg-2 sidebar">
          <a href="index.php">
            <img src="images/CrisisCrew.png" alt="logo" class="img-fluid" />
          </a>

          <div class="list-group mt-3">
          <a href="client_dashboard.php">Dashboard</a>
            <a href="My Profile.php">My Profile</a>
  
          </div>

          <footer class="mt-3">
            <a href="index.php" style="color: #adb5bd">Logout</a>
          </footer>
        </nav>

        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
            <h4 style="color: #343a40">Welcome, <?php echo $username ?? ''; ?></h4>
            <p style="color: #6c757d">
              Find Your Cause, Make a Difference , Your
              Gateway to Meaningful Impact.
            </p>

            <h5>User Dashboard</h5>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($firstName ?? ''); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lastName ?? ''); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email ?? ''); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($contact ?? ''); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($address ?? ''); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($location ?? ''); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender ?? ''); ?></p>
        <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($bloodGroup ?? ''); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($DOB ?? ''); ?></p>
        <p><strong>Skills:</strong>
            <ul>
                <?php if (isset($skills) && is_array($skills)) : ?>
                    <?php foreach ($skills as $skill) : ?>
                        <li><?php echo htmlspecialchars($skill); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </p>


            <a href="update_volunteer.php" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
