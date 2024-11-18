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

    // Retrieve the destination IDs from the database
    $packageType = $data['packageType'];
    $destinations = [
        'travelersFavorites' => [13, 14, 16, 17],
        'adventure' => [5, 11, 13, 21, 23, 26]
    ];

    if (!array_key_exists($packageType, $destinations)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid package type']);
        exit;
    }

    $selectedDestinations = $destinations[$packageType];

    // Prepare SQL to insert destinations into the itinerary
    $conn->begin_transaction();

    try {
        foreach ($selectedDestinations as $destination_id) {
            $stmt = $conn->prepare("INSERT INTO itinerary_cart (email_of_the_user, id, num_of_people, days_to_stay, total_amount) VALUES (?, ?, ?, ?, ?)
                                    ON DUPLICATE KEY UPDATE num_of_people = VALUES(num_of_people), days_to_stay = VALUES(days_to_stay), total_amount = VALUES(total_amount)");
            
            // Retrieve the number of people from the database
            if (!isset($data['num_people'])) {
                $num_people_query = $conn->prepare("SELECT num_people FROM users WHERE email = ?");
                $num_people_query->bind_param("s", $email);
                $num_people_query->execute();
                $num_people_query->bind_result($num_people);
                $num_people_query->fetch();
                $num_people_query->close();
            } else {
                $num_people = (int)$data['num_people'];
            }
            
            // Retrieve the location type from the destinations table
            $location_type_query = $conn->prepare("SELECT location_type FROM destinations WHERE id = ?");
            $location_type_query->bind_param("i", $destination_id);
            $location_type_query->execute();
            $location_type_query->bind_result($location_type);
            $location_type_query->fetch();
            $location_type_query->close();

            // Set days_to_stay based on location type
            if ($location_type === 'spot') {
                $days_to_stay = 1;
            } elseif ($location_type === 'adventure') {
                $days_to_stay = 3;
            } else {
                $days_to_stay = 3; // Default value
            }
            
            $total_amount = isset($data['total_amount']) ? (float)$data['total_amount'] : 0.0;
            $stmt->bind_param("siiid", $email, $destination_id, $num_people, $days_to_stay, $total_amount);
            $stmt->execute();
            $stmt->close();
        }
        $conn->commit();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Error adding destinations to itinerary']);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>