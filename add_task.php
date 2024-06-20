<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $query = "INSERT INTO tasks (user_id, title, description, due_date, priority, status) VALUES ('$user_id', '$title', '$description', '$due_date', '$priority', '$status')";
    if (mysqli_query($conn, $query)) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="container">
        <h1>Add Task</h1>
        <form method="POST" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br>
            <label for="due_date">Due Date:</label>
            <input type="datetime-local" id="due_date" name="due_date" required><br>
            <label for="priority">Priority:</label>
            <select id="priority" name="priority" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select><br>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="To Do">To Do</option>
                <option value="Urgent">Urgent</option>
                <option value="Done">Done</option>
            </select><br>
            <button type="submit">Add Task</button>
        </form>
    </div>
</body>
</html>
