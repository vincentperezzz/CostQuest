<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "costquest";

session_start(); // Start the session

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT first_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($first_name, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, store user details in session and redirect to dashboard
            $_SESSION['first_name'] = $first_name;
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            echo "<script> window.location.href = 'login.php?alert=1'; </script>";
        }
    } else {
        // Email not found
        echo "<script> window.location.href = 'login.php?alert=1'; </script>";
    }

    $stmt->close();
}

$conn->close();