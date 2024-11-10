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
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
    $num_people = isset($_POST['num_people']) ? $_POST['num_people'] : 0;
    $budget = isset($_POST['budget']) ? $_POST['budget'] : 0.00;

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email already exists
        echo "<script>alert('Email already exists. Please use a different email.'); window.location.href = 'signup.php';</script>";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, num_people, budget) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii", $first_name, $last_name, $email, $password, $num_people, $budget);

        if ($stmt->execute()) {
            echo "<script> window.location.href = 'dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'signup.php';</script>";
        }
    }

    $stmt->close();
}

$conn->close();