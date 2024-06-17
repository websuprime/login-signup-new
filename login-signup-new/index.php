<?php
session_start();
include "db.php";

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>

<body>
    <?php if (!$loggedIn) : ?>
        <h3><a href="./login.php">Login</a></h3>
    <?php endif; ?>
    <h3><a href="./signup.php">Signup</a></h3>
</body>

</html>