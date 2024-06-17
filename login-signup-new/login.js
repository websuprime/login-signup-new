// login.js
$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: 'loginProcess.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = 'index2.php';
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An error occurred while processing your request. Please try again.');
            }
        });
    });
});
