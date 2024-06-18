<!-- login.php -->
<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to the dashboard or any other page
    header("Location: index2.php");
    exit(); // Ensure that script stops here to prevent further execution
}

$error = "";
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <h1>Student Login Form</h1>
    <?php if (!empty($error)) : ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form id="loginForm">
        <label for="username">Username or Email:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username or Email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>
    <div class="links">
        <button onclick="location.href='./signup.php'">Signup</button>
        <h3><a href="./forgot_password.php">Forgot Password</a></h3>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="login.js"></script>
</body>

</html>