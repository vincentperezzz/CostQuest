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
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Verify the old password
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        // Verify password
        if (password_verify($old_password, $hashed_password)) {
            // Update the password
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $update_stmt->bind_param('ss', $new_hashed_password, $email);
            if ($update_stmt->execute()) {
                echo "success";
            } else {
                echo "Error: " . $update_stmt->error;
            }
            $update_stmt->close();
        } else {
            echo "Invalid old password";
        }
    } else {
        echo "Email not found";
    }
    $stmt->close();
}
$conn->close();
?>