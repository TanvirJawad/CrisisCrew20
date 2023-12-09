<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Volunteer Sign Up</title>

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
        background-color: #1f1c3b; /* Dark background color for the sidebar */
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
            <a href="index.php">Homepage</a>
            <a href="client_login.php">Volunteer Log In</a>
            <a href="login.php">Admin Log In</a>
          </div>

       
        </nav>

        <!-- Main Content Area -->
        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
            <h4 style="color: #343a40">Welcome,  </h4>
            <p style="color: #6c757d">
              You have administrative privileges to manage Crisis Crew
              activities.
            </p>

            <h5>Personal Information</h5>

     <form method="POST" action="process_form.php" enctype="multipart/form-data">

              <div class="form-row">
                <!-- First Row -->
                <div class="form-group col-md-6">
                  <label for="firstName" style="color: #676a6a"
                    >First Name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    name="firstName"
                    placeholder="Enter First Name"
                    required
                  />
                </div>

                <div class="form-group col-md-6">
                  <label for="lastName" style="color: #676a6a">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    name="lastName"
                    placeholder="Enter Last Name"
                    required
                  />
                </div>

                <!-- Second Row -->
                <div class="form-group col-md-6">
                  <label for="email" style="color: #676a6a">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter Email"
                    required
                  />
                </div>

                <div class="form-group col-md-6">
                  <label for="contact" style="color: #676a6a">Contact</label>
                  <input
                    type="tel"
                    class="form-control"
                    id="contact"
                    name="contact"
                    placeholder="Enter Contact Number"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="email" style="color: #676a6a">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                  />
                </div>

                <div class="form-group col-md-6">
                  <label for="password" style="color: #676a6a">Password</label>
                  <input
                    type="text"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                  />
                </div>

                <!-- Third Row -->
                <div class="form-group col-md-6">
                  <label for="address" style="color: #676a6a">Address</label>
                  <textarea
                    class="form-control"
                    id="address"
                    name="address"
                    placeholder="Enter Address"
                    required
                  ></textarea>
                </div>

                <div class="form-group col-md-6">
                  <label for="location" style="color: #676a6a">Location</label>
                  <input
                    type="text"
                    class="form-control"
                    id="location"
                    name="location"
                    placeholder="Enter Location"
                    required
                  />
                </div>

                <!-- Fourth Row -->
                <div class="form-group col-md-6">
                  <label for="gender" style="color: #676a6a">Gender</label>
                  <select
                    class="form-control"
                    id="gender"
                    name="gender"
                    required
                  >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="bloodGroup" style="color: #676a6a"
                    >Blood Group</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="bloodGroup"
                    name="bloodGroup"
                    placeholder="Enter Blood Group"
                    required
                  />
                </div>

                <!-- Additional Fields -->
                <div class="form-group col-md-6">
                  <label for="DOB" style="color: #676a6a"  
                    >Date Of Birth</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="DOB"
                    name="DOB"
                    placeholder="Enter Your Date Of Birth"
                    required
                  />
                </div>
                <!-- <div class="form-group col-md-6">
                    <label for="Photo" style="color: #676a6a"
                      >Photo</label
                    >
                    <div class="input-group">
                        <input class="input--style-1" type="file" placeholder="file" name="file">
                    </div>
                  </div> -->
                  <div class="form-group col-md-6">
                    <label style="color: #676a6a;">Skills</label>
                    <div>
                        <!-- Checkboxes for fire disaster management skills - First Row -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="fireSuppression" value="Fire Suppression Techniques">
                            <label class="form-check-label" for="fireSuppression">Fire Suppression Techniques</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="evacuationPlanning" value="Emergency Evacuation Planning">
                            <label class="form-check-label" for="evacuationPlanning">Emergency Evacuation Planning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="incidentCommandSystem" value="Incident Command System (ICS)">
                            <label class="form-check-label" for="incidentCommandSystem">Incident Command System (ICS)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="safetyInspections" value="Fire Safety Inspections">
                            <label class="form-check-label" for="safetyInspections">Fire Safety Inspections</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="materialsHandling" value="Hazardous Materials Handling">
                            <label class="form-check-label" for="materialsHandling">Hazardous Materials Handling</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <!-- Checkboxes for fire disaster management skills - Second Row -->
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="equipmentOperation" value="Firefighting Equipment Operation">
                        <label class="form-check-label" for="equipmentOperation">Firefighting Equipment Operation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="communicationCoordination" value="Crisis Communication and Coordination">
                        <label class="form-check-label" for="communicationCoordination">Crisis Communication and Coordination</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="firstAid" value="First Aid and Basic Life Support">
                        <label class="form-check-label" for="firstAid">First Aid and Basic Life Support</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="riskAssessment" value="Fire Risk Assessment">
                        <label class="form-check-label" for="riskAssessment">Fire Risk Assessment</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="investigationReporting" value="Fire Investigation and Reporting">
                        <label class="form-check-label" for="investigationReporting">Fire Investigation and Reporting</label>
                    </div>
                </div>
                

              <!-- Action Button -->
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-block">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
