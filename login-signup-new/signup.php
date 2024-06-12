<?php
session_start();

$nameErr = isset($_SESSION['nameErr']) ? $_SESSION['nameErr'] : '';
$usernameErr = isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : '';
$emailErr = isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : '';
$passwordErr = isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : '';
$confirmPasswordErr = isset($_SESSION['confirmPasswordErr']) ? $_SESSION['confirmPasswordErr'] : '';

$fullName = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
</head>

<body>
    <h3>Signup</h3>
    <form action="signupProcess.php" method="post">
        <div>
            <label for="full-name">Name:</label>
            <input type="text" placeholder="Full Name" name="full-name" id="full-name" value="<?php echo htmlspecialchars($fullName); ?>">
            <span style="color:red;"><?php echo htmlspecialchars($nameErr); ?></span>
        </div>
        <br>
        <div>
            <label for="username">Username:</label>
            <input type="text" placeholder="Choose your username" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
            <span style="color:red;"><?php echo htmlspecialchars($usernameErr); ?></span>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" placeholder="Email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
            <span style="color:red;"><?php echo htmlspecialchars($emailErr); ?></span>
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
            <input type="password" placeholder="Password" name="password" id="password">
            <span style="color:red;"><?php echo htmlspecialchars($passwordErr); ?></span>
        </div>
        <br>
        <div>
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" placeholder="Confirm Password" name="confirm-password" id="confirm-password">
            <span style="color:red;"><?php echo htmlspecialchars($confirmPasswordErr); ?></span>
        </div>
        <br>
        <input type="submit" value="Signup">
        <h3><a href="./login.php">Login</a></h3>
    </form>
</body>

</html>