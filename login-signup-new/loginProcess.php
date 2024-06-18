<?php
include "db.php";

ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

if (empty($_POST['username']) || empty($_POST['password'])) {
    echo json_encode(['success' => false, 'message' => 'Username and password are required.']);
    exit();
}

if (isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts']++;
} else {
    $_SESSION['login_attempts'] = 1;
}

if ($_SESSION['login_attempts'] > 3) {
    echo json_encode(['success' => false, 'message' => 'Too many login attempts. Please try again later.']);
    exit();
}

$login = $_POST['username'];
$pass = $_POST['password'];

$login = $conn->real_escape_string($login);

if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM users WHERE email = ?";
} else {
    $sql = "SELECT * FROM users WHERE username = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify hashed password
    if (password_verify($pass, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['login_attempts'] = 0; // Reset login attempts on successful login
        echo json_encode(['success' => true]);
    } else {
        // Password is incorrect
        echo json_encode(['success' => false, 'message' => 'Invalid password.']);
    }
} else {
    // No user found with given username or email
    echo json_encode(['success' => false, 'message' => 'No user found with that username or email.']);
}

$stmt->close();
$conn->close();
