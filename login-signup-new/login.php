<?php
include "db.php";

session_start();

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
</head>

<body>
    <h1>Student Login Form</h1>
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="loginProcess.php" method="post">
        <label>Username or Email: </label>
        <input type="text" placeholder="Enter Username or Email" name="username" required>
        <br>
        <label>Password: </label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <br>
    <button onclick="location.href='./signup.php'">Signup</button>
    <h3><a href="./forgot_password.php">Forgot Password</a></h3>

</body>

</html>