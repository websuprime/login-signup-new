<?php
session_start();
include "db.php";

$nameErr = $usernameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
$fullName = $username = $email = $password = $confirmPassword = "";

function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to check if a username already exists
function isUsernameTaken($conn, $username)
{
    $username = $conn->real_escape_string($username);
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// Function to check if an email already exists
function isEmailTaken($conn, $email)
{
    $email = $conn->real_escape_string($email);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize array to store validation errors
    $errors = array();

    // Validate Full Name
    if (empty($_POST['full-name'])) {
        $errors['full-name'] = "Name is required";
    } else {
        $fullName = input_data($_POST['full-name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            $errors['full-name'] = "Only alphabets and white space are allowed";
        }
    }

    // Validate Username
    if (empty($_POST['username'])) {
        $errors['username'] = "Username is required";
    } else {
        $username = input_data($_POST['username']);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $errors['username'] = "Username can only contain letters and numbers";
        } else if (isUsernameTaken($conn, $username)) {
            $errors['username'] = "Username already exists";
        }
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } else {
        $email = input_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        } else if (isEmailTaken($conn, $email)) {
            $errors['email'] = "Email already exists";
        }
    }

    // Validate Password
    if (empty($_POST['password']) || !preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6,}$/", input_data($_POST['password']))) {
        $errors['password'] = empty($_POST['password']) ? "Password is required" : "Password must be at least 6 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    // Validate Confirm Password
    if (empty($_POST['confirm-password'])) {
        $errors['confirm-password'] = "Confirm Password is required";
    } else {
        $confirmPassword = input_data($_POST['confirm-password']);
        if ($_POST['password'] !== $confirmPassword) {
            $errors['confirm-password'] = "Passwords do not match";
        }
    }

    // If there are no validation errors, proceed with inserting into database
    if (empty($errors)) {
        $fullName = $conn->real_escape_string($fullName);
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($_POST['password']); // Don't modify password before hashing

        // Hash Password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, username, email, password) VALUES ('$fullName', '$username', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('success' => true, 'message' => 'Signup successful!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error));
        }
    } else {
        // Store errors in session for display on signup.php
        $_SESSION['errors'] = $errors;
        $_SESSION['fullName'] = $fullName;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        echo json_encode(array('success' => false, 'errors' => $errors));
    }

    $conn->close();
}
