<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('Location: client_login.php');
    exit();
}

// Display the dashboard
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Crisis Responders Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"
    />

    <style>
      /* Set a fixed sidebar */

      /* CSS */

      .table-container {
        max-width: 800px;
        margin: 0 auto;
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
          <div class="list-group mt-3">
            <a href="client_dashboard.php">Dashboard</a>
            <a href="My Profile.php">My Profile</a>  
           
          </div>

          <!-- Logout Link -->
          <footer class="mt-3">
            <a href="index.php">Logout</a>
          </footer>
        </nav>

        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
          <h4>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>            <p style="color: #676a6a">
              You are a <b>Crisis Cadet:</b> Progressing through 4 steps. Become
              a Crisis Captain upon completing 10 modules!
            </p>

            <!-- Badge Images -->
            <div class="row">
              <div class="col-lg-8 col-md-8 col-12">
                <img
                  src="images/steps.png"
                  alt="Crisis Cadet Badge"
                  class="img-fluid badge-img"
                />
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-12">
                    <!-- <img
                      src="images/cto.jpg"
                      alt="Admin Avatar"
                      class="img-fluid badge-img rounded-circle"
                    /> -->
                  </div>
                  <div class="col-lg-8 col-md-8 col-12">
                    <h5 style="color: #343a40"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                    <p style="color: #6c757d">
                      Role: Volunteer<br />
                    
                    </p>
                    <!-- Edit Button -->
                               <a href="update_volunteer.php" class="btn btn-primary">Edit Profile</a>

                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="padding: 30px">
            <!-- First Row: Client Notifications -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="container">
                    <h5 class="text-left mb-4">Client Notifications</h5>
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <?php
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
 
 $username = $_SESSION['username']; // Retrieve the username from session
 
 // Step 1: Retrieve the volunteer's ID based on their username
 $query = "SELECT id FROM volunteers WHERE username = ?";
 if ($stmt = $conn->prepare($query)) {
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $volunteerID = $row['id']; // Retrieve the volunteer ID
     } else {
         echo "No user found";
         exit(); // Exit if no user is found
     }
     $stmt->close();
 } else {
     echo "Error preparing the SQL statement: " . $conn->error;
     exit(); // Exit on error
 }
 
 // Step 2: Retrieve assignments for the volunteer using their ID
 $query = "SELECT * FROM assignee WHERE id = ?";
 if ($stmt = $conn->prepare($query)) {
     $stmt->bind_param("i", $volunteerID); // Use the retrieved volunteer ID
     $stmt->execute();
     $result = $stmt->get_result();                        if ($result->num_rows > 0) {
                            echo "<h5 class='mt-3'>Assignments for Volunteer ID $volunteerID :  $username  </h5>";
                            echo "<thead class='thead-dark'>
                                    <tr>
                                        <th>Task ID</th>
                                        <th>Resource ID</th>
                                        <th>Message</th>
                                    </tr>
                                  </thead>";
                            echo "<tbody>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['task_id']}</td>
                                        <td>{$row['resource_id']}</td>
                                        <td>{$row['message']}</td>
                                      </tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "<p class='mt-3'>No assignments found for  $username .</p>";
                        }
                        $stmt->close();
                      } else {
                          echo "Error preparing the SQL statement: " . $conn->error;
                      }
                      
                      
                      
                      
                      // Close the database connection
                      $conn->close();
                      ?>                        



                    </table>
                    </div>
                </div>
            </div>

            <!-- Second Row: Today's Fire Incidents -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="table-container">
                    <h5 class="mb-4">Today's Fire Incidents</h5>
                    <?php
                    // Database connection settings
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

                    // Get today's date
                    $today = date("Y-m-d");
                    echo "Today's date  " ,  $today;
                    echo "<br>";

                    // SQL query to retrieve today's events
                    $sql = "SELECT name, location, description FROM event WHERE DATE(date) = '$today'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table table-striped table-bordered">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>';
                        echo '<th scope="col">Event Name</th>';
                        echo '<th scope="col">Event Location</th>';
                        echo '<th scope="col">Event Description</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo "No event today";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="myscript.js"></script>
  </body>
</html>
                  