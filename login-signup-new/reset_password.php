<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <h2>Reset Password</h2>
    <div id="tokenContainer">
        <!-- Token will be displayed here -->
    </div>
    <form id="resetPasswordForm" novalidate>
        <label>Token:</label>
        <input type="text" id="token" name="token" readonly> <!-- Readonly field for token -->
        <label>New Password:</label>
        <input type="password" id="newPassword" name="new_password" required>
        <label>Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirm_password" required>
        <button type="submit" id="resetPasswordBtn">Reset Password</button>
    </form>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Include custom JavaScript file -->
    <script src="resetpassword.js"></script>

    <script>
        // Function to display token from URL parameter
        function displayToken() {
            var urlParams = new URLSearchParams(window.location.search);
            var token = urlParams.get('token');
            $('#token').val(token); // Set token value in input field
            $('#tokenContainer').html('Token: ' + token); // Display token on the page
        }

        // Call displayToken function when the page loads
        $(document).ready(function() {
            displayToken();
        });
    </script>
</body>

</html>