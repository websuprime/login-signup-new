<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $new_password = $_POST["new_password"];

    $sql = "SELECT * FROM users WHERE reset_token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $sql_update = "UPDATE users SET password = '$hashed_password', reset_token = NULL WHERE id = $user_id";
        $conn->query($sql_update);

        header("Location: login.php?reset_success=1");
        exit();
    } else {
        echo "Invalid token.";
    }
} else {
    header("Location: reset_password_form.php");
    exit();
}
