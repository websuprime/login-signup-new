<!-- signup.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <!-- Include Bootstrap CSS for basic styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Toastr CSS for notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Toastr JS for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="mb-4">Signup</h3>
                <form id="signupForm" method="post" action="signupProcess.php" novalidate>
                    <div class="form-group">
                        <label for="full-name">Name:</label>
                        <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Full Name" >
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Choose your username" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                    <p class="mt-3">Already have an account? <a href="./login.php">Login here</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Include custom script for form validation -->
    <script src="signupValidation.js"></script>
</body>

</html>