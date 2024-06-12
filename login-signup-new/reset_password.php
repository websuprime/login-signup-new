<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h2>Reset Password</h2>
    <p>Token: <?php echo $_GET['token']; ?></p>
    <form action="update_password.php" method="post">
        <input type="text" name="token" placeholder="Enter token" required>
        <label>New Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>

</html>