<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_budget = $_POST['budget'];

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

    $email = $_SESSION['email'];

    // Update budget in the database
    $stmt = $conn->prepare("UPDATE users SET budget = ? WHERE email = ?");
    $stmt->bind_param("ds", $new_budget, $email);

    if ($stmt->execute() === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}