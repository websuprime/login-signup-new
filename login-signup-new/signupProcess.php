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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['full-name'])) {
        $nameErr = "Name is required";
    } else {
        $fullName = input_data($_POST['full-name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }

    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
    } else {
        $username = input_data($_POST['username']);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $usernameErr = "Username already exists";
        }
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $emailErr = "Email already exists";
            }
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else {
        $password = input_data($_POST['password']);
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6,}$/", $password)) {
            $passwordErr = "Password must be at least 6 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        }
    }

    if (empty($_POST['confirm-password'])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirmPassword = input_data($_POST['confirm-password']);
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    if (empty($nameErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $fullName = $conn->real_escape_string($fullName);
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, username, email, password) VALUES ('$fullName', '$username', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo "Signup successful!";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['nameErr'] = $nameErr;
        $_SESSION['usernameErr'] = $usernameErr;
        $_SESSION['emailErr'] = $emailErr;
        $_SESSION['passwordErr'] = $passwordErr;
        $_SESSION['confirmPasswordErr'] = $confirmPasswordErr;

        $_SESSION['fullName'] = $fullName;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        header("Location: signup.php");
        exit();
    }

    $conn->close();
}
