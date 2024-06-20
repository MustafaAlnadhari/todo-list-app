<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$task_id = $_GET['id'];
$query = "SELECT * FROM tasks WHERE id='$task_id' AND user_id='{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $query = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date', priority='$priority', status='$status' WHERE id='$task_id' AND user_id='{$_SESSION['user_id']}'";
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
    <title>Edit Task</title>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>" required><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $task['description']; ?></textarea><br>
            <label for="due_date">Due Date:</label>
            <input type="datetime-local" id="due_date" name="due_date" value="<?php echo date('Y-m-d\TH:i', strtotime($task['due_date'])); ?>" required><br>
            <label for="priority">Priority:</label>
            <select id="priority" name="priority" required>
                <option value="Low" <?php if ($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
                <option value="Medium" <?php if ($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
                <option value="High" <?php if ($task['priority'] == 'High') echo 'selected'; ?>>High</option>
            </select><br>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="To Do" <?php if ($task['status'] == 'To Do') echo 'selected'; ?>>To Do</option>
                <option value="Urgent" <?php if ($task['status'] == 'Urgent') echo 'selected'; ?>>Urgent</option>
                <option value="Done" <?php if ($task['status'] == 'Done') echo 'selected'; ?>>Done</option>
            </select><br>
            <button type="submit">Update Task</button>
        </form>
    </div>
</body>
</html>
