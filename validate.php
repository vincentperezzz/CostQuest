<?php
// Database connection
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, redirect to dashboard
            header("Location: dashboard.html");
            exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid email or password.'); window.location.href = 'login.html';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('Invalid email or password.'); window.location.href = 'login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
