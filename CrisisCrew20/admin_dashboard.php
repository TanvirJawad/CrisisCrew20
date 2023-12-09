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

    <title>Admin Dashboard</title>

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

    .welcome-message h4 {
        color: #343a40; /* Dark text color for the welcome message header */
    }

    .welcome-message p {
        color: #6c757d; /* Gray text color for the welcome message paragraph */
    }

    .edit-button {
        background-color: #007bff; /* Blue background color for the edit button */
        color: #ffffff; /* White text color for the edit button */
        border: none;
    }

    .edit-button:hover {
        background-color: #0056b3; /* Darker blue background on hover */
    }

    .avatar-image {
        width: 100%; /* Make the avatar image fill its container */
    }

    /* Volunteer List Table Styles */
    .volunteer-table {
        margin-top: 30px;
    }

    .volunteer-table th, .volunteer-table td {
        border-color: #dee2e6; /* Lighter border color for table cells */
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff; /* Blue color for pagination links */
    }

    .pagination .page-item .page-link:hover {
        background-color: #007bff; /* Darker blue background on hover */
        border-color: #007bff;
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
            <h4 style="color: #343a40">Welcome , <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p style="color: #6c757d">
              You have administrative privileges to manage Crisis Crew
              activities.
            </p>

            <!-- Badge Images -->
            <!-- Admin Personal Details with Edit Option -->
<div class="row">
  <div class="col-lg-8 col-md-8 col-12">
 
<div class="container mt-4">



<h5>Volunteer Search</h5>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row mb-3">
            <div class="col-md-6">
                <select name="searchOption" class="form-control">
                    <option value="location">Location</option>
                    <option value="bloodGroup">Blood Group</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="searchInput" class="form-control" placeholder="Search...">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <h5>Volunteer Search Results</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Blood Group</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if the form has been submitted and if searchOption and searchInput are set
            if (isset($_GET["searchOption"]) && isset($_GET["searchInput"])) {
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

                // Get the search option and input from the form
                $searchOption = $_GET["searchOption"];
                $searchInput = $_GET["searchInput"];

                // SQL query to retrieve data based on the selected search option and input
                $sql = "SELECT id, CONCAT(firstName, ' ', lastName) AS Name, location, bloodGroup FROM volunteers";

                if ($searchOption === "location") {
                    $sql .= " WHERE location LIKE '%" . $searchInput . "%'";
                } elseif ($searchOption === "bloodGroup") {
                    $sql .= " WHERE bloodGroup LIKE '%" . $searchInput . "%'";
                }

                // Execute the SQL query
                $result = $conn->query($sql);

                if (!$result) {
                    die("SQL Error: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td>' . $row['bloodGroup'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="4">No volunteers found matching the search criteria.</td>';
                    echo '</tr>';
                }

                // Close the database connection
                $conn->close();
            } else {
                // Display a message when no search has been performed
                echo '<tr>';
                echo '<td colspan="4">No volunteer has been searched yet.</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>




        </tbody>
    </table>



   


</div>







  </div>
  <div class="col-lg-4 col-md-4 col-12">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <!-- <img
          src="images/ceo.jpg"
          alt="Admin Avatar"
          class="img-fluid badge-img rounded-circle"
        /> -->
      </div>
      <div class="col-lg-8 col-md-8 col-12">
        <h5 style="color: #343a40"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
        <p style="color: #6c757d">
          Role: admin<br />
   
        </p>
        <!-- Edit Button -->
        <!-- <div class="container mt-4">
          <h5>Image Upload</h5>

          <?php if (isset($_GET['upload_error'])): ?>
            <p style="color: red;"><?php echo $_GET['upload_error']; ?></p>
          <?php endif ?>

          <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="my_image">
            <input type="submit" name="submit" value="Upload">
          </form>
        </div> -->



        
    
      </div>
    </div>
  </div>
</div>

<!-- Training Badge and Fire Incidents Table -->
<div class="row" style="padding: 30px">
  <div class="table-container">
      <h5 class="mb-4">Volunteer List</h5>
      <div class="table-responsive">
      <?php
        // Database connection settings
   $servername = "localhost";
$dbUsername = "sowadrahman";
$dbPassword= "kikhobor";
$dbname = "crisiscrew20";

        // Create a connection to the database
        $conn = new mysqli($servername, $dbUsername,$dbPassword, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve data from the volunteers table
        $sql = "SELECT id, CONCAT(firstName, ' ', lastName) AS Name, gender, bloodGroup, location, email, contact ,username FROM volunteers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo '<table class="table table-striped table-bordered">';
          echo '<thead class="thead-dark">';
          echo '<tr>';
          echo '<th scope="col">ID</th>';
          echo '<th scope="col">Name</th>';
          echo '<th scope="col">username</th>';

          echo '<th scope="col">Gender</th>';
          echo '<th scope="col">Blood Group</th>';
          echo '<th scope="col">Location</th>';
          echo '<th scope="col">Email</th>';
          echo '<th scope="col">Phone</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';

          while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $row['id'] . '</td>';
              echo '<td>' . $row['Name'] . '</td>';
              echo '<td>' . $row['username'] . '</td>';

              echo '<td>' . $row['gender'] . '</td>';
              echo '<td>' . $row['bloodGroup'] . '</td>';
              echo '<td>' . $row['location'] . '</td>';
              echo '<td>' . $row['email'] . '</td>';
              echo '<td>' . $row['contact'] . '</td>';
              echo '</tr>';
          }

          echo '</tbody>';
          echo '</table>';
      } else {
          echo "No records found";
      }

      // Close the database connection
      $conn->close();
      ?>
      </div>

      <h5>Delete Volunteer by Username</h5>
    <form action="delete_volunteer.php" method="post">
        <label for="username">Enter Username to Delete:</label>
        <input type="text" id="username" name="username" required>
        <button class="btn btn btn-danger"  type="submit">Delete</button>
    </form>
    
  </div>
</div>



<!-- Bootstrap JS and Custom Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="myscript.js"></script>
<!-- ... (Previous HTML code for admin_dashboard.php) ... -->
</body>
</html>