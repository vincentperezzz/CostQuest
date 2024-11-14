<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "costquest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_email = $_POST['old_email'];
    $new_email = $_POST['new_email'];
    $password = $_POST['password'];
    $session_email = $_SESSION['email']; // Assuming you have the user email stored in the session

    // Verify the old email and password
    $stmt = $conn->prepare("SELECT first_name, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $old_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($first_name, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Update the email
            $stmt = $conn->prepare("UPDATE users SET email = ? WHERE email = ?");
            $stmt->bind_param('ss', $new_email, $old_email);

            if ($stmt->execute()) {
                // Update the session email
                $_SESSION['email'] = $new_email;
                $_SESSION['first_name'] = $first_name;
                echo "success";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // Password is incorrect
            echo "Invalid email or password";
        }
    } else {
        // Email not found
        echo "Invalid email or password";
    }

    $stmt->close();
}

$conn->close();
?>