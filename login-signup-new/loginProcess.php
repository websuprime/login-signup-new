<?php
include "db.php";

ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['error'] = "Username and password are required.";
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts']++;
} else {
    $_SESSION['login_attempts'] = 1;
}

if ($_SESSION['login_attempts'] > 3) {
    $_SESSION['error'] = "Too many login attempts. Please try again later.";
    header("Location: forgot_password.php");
    exit();
}

$login = $_POST['username'];
$pass = $_POST['password'];

$login = $conn->real_escape_string($login);
$pass = $conn->real_escape_string($pass);

if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM users WHERE email = '$login'";
} else {
    $sql = "SELECT * FROM users WHERE username = '$login'";
}

$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($pass, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: index2.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid password.";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "No user found with that username or email.";
    header("Location: login.php");
    exit();
}

$conn->close();
