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
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    // Get email from session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        echo json_encode(["status" => "error", "message" => "User not logged in."]);
        exit;
    }
    $id = $data['id'];
    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM itinerary_cart WHERE email_of_the_user = ? AND id = ?");
    $stmt->bind_param("si", $email, $id);
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>