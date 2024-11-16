<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "costquest"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Get email from session
if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'No email in session']);
    exit();
}

$email = $_SESSION['email'];

// Query the database
$sql = "SELECT * FROM itinerary_cart WHERE email_of_the_user = ?"; // Ensure 'email' column exists in the table
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data and output as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);