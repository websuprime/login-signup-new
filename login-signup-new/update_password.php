<?php
include "db.php";

header('Content-Type: application/json');

// Function to sanitize input data
function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize response array
$response = array('success' => false, 'message' => '', 'errors' => array());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $token = isset($_POST['token']) ? input_data($_POST['token']) : '';
    $new_password = isset($_POST['new_password']) ? input_data($_POST['new_password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? input_data($_POST['confirm_password']) : '';

    // Validate new password
    if (empty($new_password) || $new_password !== $confirm_password) {
        $response['errors']['new_password'] = "Passwords do not match";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6,}$/", $new_password)) {
        $response['errors']['new_password'] = "Password must be at least 6 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    if (empty($response['errors'])) {
        // Validate token and update password in the database
        $sql = "SELECT * FROM users WHERE reset_token = '$token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $row = $result->fetch_assoc();
            $user_id = $row["id"];
            $sql_update = "UPDATE users SET password = '$hashed_password', reset_token = NULL WHERE id = $user_id";
            $conn->query($sql_update);

            $response['success'] = true;
            $response['message'] = 'Password reset successfully';
        } else {
            $response['message'] = 'Invalid token';
        }
    } else {
        $response['message'] = 'There were errors with your submission';
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
