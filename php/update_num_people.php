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
    $num_people = intval($_POST['num_people']);
    $email = $_SESSION['email']; // Assuming you have the user email stored in the session

    $stmt = $conn->prepare("UPDATE users SET num_people = ? WHERE email = ?");
    $stmt->bind_param('is', $num_people, $email); // 'i' for integer, 's' for string

    if ($stmt->execute()) {
        echo 'Success';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}