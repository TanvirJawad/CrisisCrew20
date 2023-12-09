<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Add your custom styles if needed -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff; /* White background for the login form */
            padding: 20px;
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the form */
            margin-top: 100px;
        }

        h3 {
            text-align: center;
            color: #1ea6bc; /* Blue color for the heading */
        }

        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 45%; /* Adjust as needed */
        }

        .form-group {
            width: 48%; /* Adjust as needed */
        }

        .form-label {
            color: #495057; /* Dark gray color for form labels */
        }

        .btn-primary {
            background-color: #1ea6bc; /* Blue background color for the login button */
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue background on hover */
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
            color: #0cc0df;
            text-decoration: none;

        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Login</h3>
        <div class="logo-container">
            <div class="logo">
                <img src="images/CrisisCrew.png" width="200" alt="Logo">
            </div>
            <div class="form-group">
                <form action="login_process.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <p class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
        </p>
    </div>
    <!-- Include necessary scripts -->
    <!-- Bootstrap JS if needed -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Add your custom scripts if needed -->
    <script>
        // Custom scripts go here
    </script>
</body>
</html>
