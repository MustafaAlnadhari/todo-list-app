# todo-list-app
# To Do List App

A simple To Do List web application.

## Prerequisites

- [XAMPP] (includes PHP, MySQL, and Apache)

## Installation

1. Clone the repository:
  
2. Import the database:
    - Open phpMyAdmin by visiting `http://localhost/phpmyadmin` in your web browser.
    - Create a new database named `todo_list`.
    - Import the `schema.sql` file located in the `sql` directory by clicking on the `Import` tab in phpMyAdmin and selecting the `schema.sql` file.

3. Configure the database connection:
    - Create a file named `db.php` in the root directory of your project with the following content:
    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo_list";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```
    - If you have set a password for the `root` user, replace `""` with your password.

4. Move project files to the web server directory:
    - Copy the entire `todo-list-app` folder to the `htdocs` directory of your XAMPP installation (typically found at `C:\xampp\htdocs` on Windows).

5. Start the web server:
    - Open the XAMPP Control Panel.
    - Start the Apache and MySQL services.

6. Access the web app:
    - Open a web browser and navigate to `http://localhost/todo-list-app`.

## Usage

- **Sign Up**: Create a new user account.
- **Login**: Log in with your credentials.
- **Add Task**: Create new tasks and manage them.
- **Edit Task**: Update existing tasks.
- **Delete Task**: Remove tasks that are no longer needed.
- **Task Status**: Change task status to "To Do," "Urgent," or "Done."

## Additional Information

- Ensure that the `db.php` file is correctly configured to connect to your MySQL database.
- If you encounter any issues, check the XAMPP Control Panel for error messages and verify your database settings in `phpMyAdmin`.

---

By following these steps, you can set up and run the To Do List web application locally using XAMPP.
