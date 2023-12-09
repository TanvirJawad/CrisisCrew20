<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Forgot Password</title>
    <!-- Include necessary stylesheets, for example, Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Add your custom styles if needed -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the form */
            margin-top: 100px;
        }

        h3 {
            text-align: center;
            color: #0cc0df; /* Blue color for the heading */
        }

        .form-group {
            width: 100%; /* Adjust as needed */
        }

        .form-label {
            color: #495057; /* Dark gray color for form labels */
        }

        .btn-primary {
            background-color: #0cc0df; /* Blue background color for the submit button */
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue background on hover */
        }

        .logo {
            text-align: center;
            margin-bottom: 20px; /* Adjust as needed */
        }

        .logo img {
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="logo">
            <img src="images/CrisisCrew.png" width="200" alt="Logo">
        </div>
        <h3>Forgot Password</h3>
        <form action="forgot_password_process.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
