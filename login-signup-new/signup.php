<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="styles/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="container">
        <form id="signupForm" class="mt-5" method="post" action="signupProcess.php">
            <h3 class="mb-3">Signup</h3>
            <div class="mb-3">
                <label for="full-name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Full Name">
                <div class="form-text text-danger" id="nameErr"></div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Choose your username">
                <div class="form-text text-danger" id="usernameErr"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <div class="form-text text-danger" id="emailErr"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <div class="form-text text-danger" id="passwordErr"></div>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                <div class="form-text text-danger" id="confirmPasswordErr"></div>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
            <h3 class="mt-3"><a href="./login.php">Login</a></h3>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="scripts/signup.js"></script>
</body>

</html>

<?php
// Clear session variables after displaying errors
unset($_SESSION['nameErr']);
unset($_SESSION['usernameErr']);
unset($_SESSION['emailErr']);
unset($_SESSION['passwordErr']);
unset($_SESSION['confirmPasswordErr']);
?>