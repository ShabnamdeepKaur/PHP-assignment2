<?php
include_once 'database.php';

// Function to validate and sanitize user input
function sanitize_input($input) {
    // Perform necessary sanitization
    return $input;
}

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'signup') {
        // User signup action
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = sanitize_input($_POST['username']);
            $password = $_POST['password'];

            // Validate and sanitize input before inserting into the database
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                header("Location: signin.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    if ($_GET['action'] === 'login') {
        // User login action
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = sanitize_input($_POST['username']);
            $password = $_POST['password'];

            // Validate and sanitize input before querying the database

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                   
                    header("Location: success.php");
                    exit();
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
            }
        }
    }
    // Add more actions (e.g., registration) as needed
}
?>
