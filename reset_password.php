<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $user_id = $_SESSION['user_id'];

    $query = "SELECT password FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($current_password, $user['password'])) {
        $query = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
        if (mysqli_query($conn, $query)) {
            header('Location: dashboard.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Current password is incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form method="POST" action="">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required><br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
