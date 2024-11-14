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
    $email = $_SESSION['email']; // Assuming you have the user email stored in the session
    $password = $_POST['password'];

    // Verify the password
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Delete the account
            $delete_stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
            $delete_stmt->bind_param('s', $email);

            if ($delete_stmt->execute()) {
                // Destroy the session
                session_destroy();
                echo "success";
            } else {
                echo "Error: " . $delete_stmt->error;
            }
            $delete_stmt->close();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Email not found";
    }
    $stmt->close();
}
$conn->close();
?>