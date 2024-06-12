<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(16));

        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $sql = "UPDATE users SET reset_token = '$token' WHERE id = $user_id";
        $conn->query($sql);

        header("Location: reset_password.php?token=$token");
        exit();
    } else {
        echo "User not found.";
    }
} else {
    header("Location: forgot_password.php");
    exit();
}
