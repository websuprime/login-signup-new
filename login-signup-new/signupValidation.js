$(document).ready(function () {
  // Initialize Toastr with options
  toastr.options = {
    progressBar: true,
    closeButton: true,
    timeOut: 3000, // Adjust timeout as needed (in milliseconds)
  };

  // Variable to store current error message
  var currentError = null;

  $("#signupForm").submit(function (e) {
    e.preventDefault(); // Prevent form submission

    // Clear previous toastr messages
    toastr.clear();

    // Collect form data
    var formData = {
      "full-name": $("#full-name").val().trim(),
      username: $("#username").val().trim(),
      email: $("#email").val().trim(),
      password: $("#password").val().trim(),
      "confirm-password": $("#confirm-password").val().trim(),
    };

    // Submit form via Ajax
    $.ajax({
      type: "POST",
      url: "signupProcess.php",
      data: formData,
      dataType: "json",
      encode: true,
      success: function (response) {
        if (response.success) {
          toastr.success(response.message);
          setTimeout(function () {
            window.location.href = "login.php"; // Redirect to login page after success
          }, 2000); // 2 seconds delay
        } else {
          // Display validation errors using Toastr
          if (response.errors) {
            $.each(response.errors, function (key, value) {
              if (value !== currentError) {
                // Check if error is different from current
                toastr.error(value);
                currentError = value; // Update current error
                return false; // Exit loop after displaying first error
              }
            });
          }
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
        toastr.error("An error occurred while processing your request.");
      },
    });

    // Optional: Clear current error message after a delay or based on user action
    setTimeout(function () {
      currentError = null;
      toastr.clear();
    }, 5000); // Clear message after 5 seconds (adjust as needed)
  });

  // Optional: Clear current error message when focus changes on input fields
  $("#signupForm input").focus(function () {
    currentError = null;
    toastr.clear();
  });
});
