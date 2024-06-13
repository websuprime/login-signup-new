$(document).ready(function () {
    $('#signupForm').submit(function (event) {
        event.preventDefault();
        
        let fullName = $('#full-name').val().trim();
        let username = $('#username').val().trim();
        let email = $('#email').val().trim();
        let password = $('#password').val().trim();
        let confirmPassword = $('#confirm-password').val().trim();

        $.ajax({
            url: 'signupProcess.php',
            type: 'POST',
            data: {
                'full-name': fullName,
                'username': username,
                'email': email,
                'password': password,
                'confirm-password': confirmPassword
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    window.location.href = 'login.php';
                } else {
                    toastr.error(response.message);
                    displayErrors(response.errors);
                }
            },
            error: function () {
                toastr.error('Error occurred during signup.');
            }
        });
    });

    // Function to display form validation errors
    function displayErrors(errors) {
        $('#nameErr').text(errors.fullName || '');
        $('#usernameErr').text(errors.username || '');
        $('#emailErr').text(errors.email || '');
        $('#passwordErr').text(errors.password || '');
        $('#confirmPasswordErr').text(errors.confirmPassword || '');
    }
});
