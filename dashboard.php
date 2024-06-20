<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM tasks WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Categorize tasks by status
$tasks_to_do = array_filter($tasks, function($task) {
    return $task['status'] == 'To Do';
});
$tasks_urgent = array_filter($tasks, function($task) {
    return $task['status'] == 'Urgent';
});
$tasks_done = array_filter($tasks, function($task) {
    return $task['status'] == 'Done';
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <a href="add_task.php">Add Task</a>
        <a href="edit_profile.php">Edit Profile</a>
        <a href="reset_password.php">Reset Password</a>
        <a href="logout.php">Logout</a>

        <h2>Tasks To Do</h2>
        <ul>
            <?php foreach ($tasks_to_do as $task): ?>
                <li>
                    <strong><?php echo $task['title']; ?></strong><br>
                    <?php echo $task['description']; ?><br>
                    Due: <?php echo $task['due_date']; ?><br>
                    Priority: <?php echo $task['priority']; ?><br>
                    Status: <?php echo $task['status']; ?><br>
                    <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2>Urgent Tasks</h2>
        <ul>
            <?php foreach ($tasks_urgent as $task): ?>
                <li>
                    <strong><?php echo $task['title']; ?></strong><br>
                    <?php echo $task['description']; ?><br>
                    Due: <?php echo $task['due_date']; ?><br>
                    Priority: <?php echo $task['priority']; ?><br>
                    Status: <?php echo $task['status']; ?><br>
                    <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2>Completed Tasks</h2>
        <ul>
            <?php foreach ($tasks_done as $task): ?>
                <li>
                    <strong><?php echo $task['title']; ?></strong><br>
                    <?php echo $task['description']; ?><br>
                    Due: <?php echo $task['due_date']; ?><br>
                    Priority: <?php echo $task['priority']; ?><br>
                    Status: <?php echo $task['status']; ?><br>
                    <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
