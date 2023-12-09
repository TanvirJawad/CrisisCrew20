<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Disaster Event</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <style>
      /* Additional Styles */
      .table-container {
        max-width: 800px;
        margin: 0 auto;
      }

      /* Adjustments for Admin Appearance */
      body {
        background-color: #f8f9fa; /* Light gray background */
      }

      .sidebar {
        background-color: #343a40; /* Dark background color for the sidebar */
        color: #dee2e6; /* Light text color for the sidebar */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the sidebar */
      }

      .list-group a {
        color: #adb5bd; /* Light text color for sidebar links */
      }

      .list-group a:hover {
        background-color: #495057; /* Darker background color on hover */
      }

      .welcome-message {
        background-color: #ffffff; /* White background for the main content area */
        padding: 20px;
        border-radius: 8px; /* Rounded corners for the content area */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the content area */
        margin-top: 20px;
      }

      .table th,
      .table td {
        border-color: #dee2e6; /* Lighter border color for table cells */
      }
    </style>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 sidebar">
          <a href="index.php">
            <img src="images/CrisisCrew.png" alt="logo" class="img-fluid" />
          </a>

          <!-- Sidebar Navigation Links -->
          <div class="list-group mt-3">
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="disaster_event.php">Disaster Event</a>
            <a href="task_management.php">Task Management</a>
            <a href="resource_management.php">Resource Management</a>
          </div>

          <!-- Logout Link -->
          <footer class="mt-3">
            <a href="index.php" style="color: #adb5bd">Logout</a>
          </footer>
        </nav>

        <!-- Main Content Area -->
        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
            <h4 style="color: #343a40">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p style="color: #6c757d">
              Find Your Cause, Make a Difference - VolunteerConnect, Your
              Gateway to Meaningful Impact.
            </p>
    
                <div class="container">
                  <h5 class="text-left mb-4">Event Management</h5>
                

                  <a href="add_event.php" class="btn btn-primary mb-3">Add Event</a>
                  <div class="table-responsive">
                  <?php

// Database connection settings
$servername = "localhost";
$dbUsername = "sowadrahman";
$dbPassword = "kikhobor";
$dbname = "crisiscrew20"; // Change to the "event" database

// Create a connection to the database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a variable to store the event location
$eventLocation = "";

// SQL query to retrieve data from the event table
$sql = "SELECT event_id, name, description, location, date FROM event";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Event ID</th>';
    echo '<th scope="col">Event Name</th>';
    echo '<th scope="col">Event Description</th>';
    echo '<th scope="col">Event Location</th>';
    echo '<th scope="col">Event Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        // Store the event location in the variable
        $eventLocation = $row['location'];

        echo '<tr>';
        echo '<td>' . $row['event_id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No records found";
}

// Query volunteers based on the event location
// Query volunteers based on the event location
if (!empty($eventLocation)) {
  $sql = "SELECT id, firstName, lastName, email, contact FROM volunteers WHERE location = ?";
  $stmt = $conn->prepare($sql);
  
  if ($stmt === false) {
      die("Error preparing statement: " . $conn->error);
  }
  
  // Bind the event location as a parameter
  $stmt->bind_param("s", $eventLocation);
  
  // Execute the query
  if ($stmt->execute()) {
      $result = $stmt->get_result();
      
      if ($result->num_rows > 0) {
          echo '<h2>Volunteers in Event Location: ' . $eventLocation . '</h2>';
          echo '<table class="table table-striped">';
          echo '<thead class="thead-dark">';
          echo '<tr>';
          echo '<th scope="col">ID</th>';
          echo '<th scope="col">First Name</th>';
          echo '<th scope="col">Last Name</th>';
          echo '<th scope="col">Email</th>';
          echo '<th scope="col">Contact</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          
          while ($volunteer = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $volunteer['id'] . '</td>';
              echo '<td>' . $volunteer['firstName'] . '</td>';
              echo '<td>' . $volunteer['lastName'] . '</td>';
              echo '<td>' . $volunteer['email'] . '</td>';
              echo '<td>' . $volunteer['contact'] . '</td>';
              echo '</tr>';
          }            
          echo '</tbody>';
          echo '</table>';
      } else {
          echo "No volunteers found in the event location.";
      }
  } else {
      echo "Error executing query: " . $stmt->error;
  }
  
  $stmt->close();
}





if (!empty($eventLocation)) {
  // Select volunteers in the specified event location
  $sql = "SELECT id, firstName, lastName FROM volunteers WHERE location = ?";
  
  $stmt = $conn->prepare($sql);
  
  if ($stmt === false) {
      die("Error preparing statement: " . $conn->error);
  }
  
  // Bind the event location as a parameter
  $stmt->bind_param("s", $eventLocation);
  
  // Execute the query
  if ($stmt->execute()) {
      $result = $stmt->get_result();
      
      if ($result->num_rows > 0) {
          echo '<h2>Volunteers in Event Location: ' . $eventLocation . '</h2>';
          
          // Create the assignee form
          echo '<form method="POST" action="assigne_process.php">';
          
          // Dropdown list (select element) for volunteers
          echo '<div class="form-group">';
          echo '<label for="id">Select Volunteer:</label>';
          echo '<select class="form-control" name="id" id="id" required>';
          
          while ($row = $result->fetch_assoc()) {
              // Populate the dropdown options with volunteer names and IDs
              echo '<option value="' . $row['id'] . '">' . $row['firstName'] . ' ' . $row['lastName'] . '</option>';
          }
          echo '</select>';
          echo '</div>';
          
          // Dropdown list for tasks
          echo '<div class="form-group">';
          echo '<label for="task_id">Select Task:</label>';
          echo '<select class="form-control" name="task_id" id="task_id" required>';
          
          $sql = "SELECT task_id, name FROM task_event";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  // Populate the dropdown options with task names and IDs
                  echo '<option value="' . $row['task_id'] . '">' . $row['name'] . '</option>';
              }
          }
          
          echo '</select>';
          echo '</div>';
          
          // Dropdown list for resources
          echo '<div class="form-group">';
          echo '<label for="resource_id">Select Resource:</label>';
          echo '<select class="form-control" name="resource_id" id="resource_id" required>';
          
          $sql = "SELECT resource_id, name FROM resource";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  // Populate the dropdown options with resource names and IDs
                  echo '<option value="' . $row['resource_id'] . '">' . $row['name'] . '</option>';
              }
          }
          
          echo '</select>';
          echo '</div>';
          
          // Message field
          echo '<div class="form-group">';
          echo '<label for="message">Message for Tasks using this Resource:</label>';
          echo '<textarea class="form-control" id="message" name="message" placeholder="Enter your message" required></textarea>';
          echo '</div>';
          
          // Add other input fields or form elements as needed
          
          // Add a submit button
          echo '<button type="submit" class="btn btn-primary">Assign Volunteer</button>';
          
          echo '</form>';
      } else {
          echo "No volunteers found in the event location.";
      }
  } else {
      echo "Error executing query: " . $stmt->error;
  }
  
  $stmt->close();
}



// Close the database connection
$conn->close();
?>





                  </div>
                </div>

                <!-- Bootstrap JS and Popper.js (optional) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            
                 
              
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
