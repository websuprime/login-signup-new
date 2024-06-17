<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <h2>Forgot Password</h2>
    <form id="forgotPasswordForm" action="generate_token.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
    <h3><a href="./signup.php">Signup</a></h3>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Include custom JavaScript file -->
    <script src="forgotpassword.js"></script>

    <script>
        // Initialize Toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };
    </script>
</body>

</html>