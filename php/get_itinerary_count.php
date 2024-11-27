<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "costquest";

if (!isset($_SESSION['email'])) {
    http_response_code(401);
    echo 'Unauthorized';
    exit;
}

$email_of_the_user = $_SESSION['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) as count FROM itinerary_cart WHERE email_of_the_user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email_of_the_user); // Use "s" for string type
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
$conn->close();

echo $count;
?>