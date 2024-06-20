<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";
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
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
