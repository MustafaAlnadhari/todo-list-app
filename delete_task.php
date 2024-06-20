<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM tasks WHERE id='$task_id' AND user_id='$user_id'";
    if (mysqli_query($conn, $query)) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header('Location: dashboard.php');
}
?>
