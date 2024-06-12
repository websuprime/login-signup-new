<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <h2>Forgot Password</h2>
    <form action="generate_token.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
    <h3><a href="./signup.php">Signup</a></h3>
</body>

</html>