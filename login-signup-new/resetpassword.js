$(document).ready(function () {
    // Initialize Toastr with options
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: "5000"
    };

    // Handle form submission via AJAX for resetting password
    $('#resetPasswordForm').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        // Reset any previous error messages
        $('.error-message').remove();

        // Submit form via AJAX
        $.ajax({
            type: 'POST',
            url: 'update_password.php', // URL to the server-side script that handles the password reset
            data: formData,
            dataType: 'json', // Response expected as JSON
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    // Redirect to login page after success (optional)
                    setTimeout(function () {
                        window.location.href = 'login.php';
                    }, 1000);
                } else {
                    if (response.errors) {
                        $.each(response.errors, function (key, value) {
                            toastr.error(value);
                        });
                    } else {
                        toastr.error(response.message);
                    }
                }
            },
            error: function (xhr, status, error) {
                toastr.error('Failed to reset password. Please try again.');
            }
        });
    });
});
