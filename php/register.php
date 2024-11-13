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
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $num_people = $_POST['num-people'];
    $budget = $_POST['budget'];

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email already exists
        echo "<script> window.location.href = '../signup.php?alert=1'; </script>";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, num_people, budget) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii", $first_name, $last_name, $email, $password, $num_people, $budget);

        if ($stmt->execute() === TRUE) {
            // Store user details in session and redirect to dashboard
            $_SESSION['first_name'] = $first_name;
            $_SESSION['email'] = $email;
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}





