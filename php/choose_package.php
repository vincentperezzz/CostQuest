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
            // Retrieve the location type and fees for the destination
            $location_type_query = $conn->prepare("
                SELECT location_type, daytour_price, overnight_price, environmental_fee, other_fees 
                FROM destinations 
                WHERE id = ?
            ");
            $location_type_query->bind_param("i", $destination_id);
            $location_type_query->execute();
            $location_type_query->bind_result($location_type, $daytour_price, $overnight_price, $environmental_fee, $other_fees);
            $location_type_query->fetch();
            $location_type_query->close();

            // Determine the number of people
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

            // Determine days to stay
            $days_to_stay = isset($data['days_to_stay']) ? (int)$data['days_to_stay'] : (($location_type === 'spot') ? 1 : 3);

            // Calculate the total cost
            if ($location_type === 'adventure') {
                $total_amount = $daytour_price * $num_people * $days_to_stay + $environmental_fee + $other_fees;
            } elseif ($location_type === 'spot') {
                $total_amount = $daytour_price * $num_people + $environmental_fee + $other_fees;
            } else {
                if ($days_to_stay === 1) {
                    $base_cost = $daytour_price;
                    if ($num_people > 2) {
                        $extra_people = $num_people - 2;
                        $base_cost += $extra_people * ($daytour_price / 2);
                    }
                    $total_amount = $base_cost + $environmental_fee + $other_fees;
                } else {
                    $base_cost = $overnight_price * ($days_to_stay - 1);
                    if ($num_people > 2) {
                        $extra_people = $num_people - 2;
                        $base_cost += $extra_people * ($overnight_price / 2) * ($days_to_stay - 1);
                    }
                    $total_amount = $base_cost + $environmental_fee + $other_fees;
                }
            }

            // Fallback to prevent negative values
            if ($total_amount < 0) {
                $total_amount = $daytour_price * 1 + $environmental_fee + $other_fees;
            }

            // Insert or update the itinerary
            $stmt = $conn->prepare("
                INSERT INTO itinerary_cart (email_of_the_user, id, num_of_people, days_to_stay, total_amount) 
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE num_of_people = VALUES(num_of_people), days_to_stay = VALUES(days_to_stay), total_amount = VALUES(total_amount)
            ");
            $stmt->bind_param("siiid", $email, $destination_id, $num_people, $days_to_stay, $total_amount);
            $stmt->execute();
            $stmt->close();
        }
        $conn->commit();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Error adding destinations to itinerary: ' . $e->getMessage()]);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

?>