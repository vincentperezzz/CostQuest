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

// Fetch destinations for San Juan
$sql = "SELECT * FROM destinations WHERE town = 'Nasugbu'";
$nasugbuResult = $conn->query($sql);
$user_number_of_people = isset($user_number_of_people) ? $user_number_of_people : 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/destination.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <?php include 'php/data_database.php'; ?>
    <script src="javascript/index.js"></script>
</head>
<body>  
    <nav class="navbar">
        <div class="max-width">
            <ul class="menu">
                <li><a href="dashboard.php" class="menu-btn">Home</a></li>
                <li><a href="settings.php" class="menu-btn">Settings</a></li>
                <li><a href="search.php" class="menu-btn">Search</a></li>
            </ul>

            <div class="logo"><a href="dashboard.php"><img src="icons/logo.png"></a></div>

            <div class="itinerary">
                <div class="itinerary-btn">Itinerary Cart</div>
                <div class="itinerary-btn-box"><a href="itineraries.php"><img class="loc-ico" src="icons/itineraries-location-icon.png">0</a></div>
            </div>
        </div>
    </nav>

    <!-- San Juan Destinations -->
    <div class="destinations-img">
        <img src="icons/search-nasugbu.png">
    </div>
    <div id="pageMessages"> </div>

    <!-- Wrapper for all destination containers -->
    <div class="destination-wrapper">
        <?php
        $ids = [];
        // Check if there are destinations
        if ($nasugbuResult->num_rows > 0) {
            // Loop through each destination
            while ($row = $nasugbuResult->fetch_assoc()) {
                $id = $row['id'];
                $ids[] = $id; 
                $name = isset($row['name']) ? $row['name'] : 'Unknown Destination';
                $address = isset($row['address']) ? $row['address'] : 'Unknown Address';
                $daytour_price = isset($row['daytour_price']) ? $row['daytour_price'] : 0;
                $overnight_price = isset($row['overnight_price']) ? $row['overnight_price'] : 0;
                $environmental_fee = isset($row['environmental_fee']) ? $row['environmental_fee'] : 0;
                $other_fees = isset($row['other_fees']) ? $row['other_fees'] : 0;
                $total_estimated_cost = isset($row['total_estimated_cost']) ? $row['total_estimated_cost'] : 0;
                $image = "icons/nasugbu-d" . $id . ".png";
                $url = isset($row['url']) ? $row['url'] : 'N/A';

                // Fetch location type
                $location_type = isset($row['location_type']) ? $row['location_type'] : 'default';
        ?>
        
        <div class="destination-container" id="destination-<?php echo $id; ?>" data-daytour-price="<?php echo $daytour_price; ?>" data-overnight-price="<?php echo $overnight_price; ?>" data-environmental-fee="<?php echo $environmental_fee; ?>" data-other-fees="<?php echo $other_fees; ?>" data-total-estimated-cost="<?php echo $total_estimated_cost; ?>" data-location-type="<?php echo $location_type; ?>">
            <div class="destination-img">
                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                <div class="price-overlay">
                    <p class="from-color">from</p>
                    <h2 id="total-cost-<?php echo $id; ?>">₱ <?php echo number_format($total_estimated_cost, 2); ?></h2>
                </div>
            </div>

            <div class="details">
                <h2 class="name">
                    <?php if ($url != 'N/A'): ?>
                        <a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a>
                    <?php else: ?>
                        <span><?php echo $name; ?></span> <!-- If URL is 'N/A', display name without hyperlink -->
                    <?php endif; ?>
                </h2>
                <p class="direction"><?php echo $address; ?></p>
                                
                <ul class="pricelist">
                    <li>Daytour Price: ₱ <?php echo number_format($daytour_price, 2); ?> 
                    <?php if ($location_type == 'hotel' || $location_type == 'resort') echo 'per two pax'; ?></li>
                    <li>Overnight Price: ₱ <?php echo number_format($overnight_price, 2); ?> 
                    <?php if ($location_type == 'hotel' || $location_type == 'resort') echo 'per two pax'; ?></li>
                    <li>Environmental Fee: ₱ <?php echo number_format($environmental_fee, 2); ?></li>
                    <li>Other Fees: ₱ <?php echo number_format($other_fees, 2); ?></li>
                </ul>
                
                <div class="styled-dropdown">
                    <!-- Dropdown for number of people -->
                    <select id="num-people-<?php echo $id; ?>" name="num-people" onchange="calculateCost(<?php echo $id; ?>)" required>
                        <option value="" disabled <?php echo empty($user_number_of_people) ? 'selected' : ''; ?>>Number of People</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo ($i == $user_number_of_people) ? 'selected' : ''; ?>>
                                <?php echo $i . ' ' . ($i === 1 ? 'person' : 'people'); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                
                    <!-- Dropdown for days to stay with onchange event -->
                    <select id="num-days-<?php echo $id; ?>" name="num-days-<?php echo $id; ?>" onchange="calculateCost(<?php echo $id; ?>); updateDaytourText(<?php echo $id; ?>); " required>
                        <option value="" disabled selected>Days to Stay</option>
                        <?php 
                        // Limit days based on location type
                        if ($location_type == 'spot') {
                            // Only allow one day for 'spot'
                            echo '<option value="1" selected>1 day</option>';
                        } else {
                            // For 'adventure' and other location types, allow multiple days up to 100
                            for ($i = 1; $i <= 100; $i++) {
                                echo '<option value="' . $i . '">' . $i . ' day' . ($i > 1 ? 's' : '') . '</option>';
                            }
                        }
                        ?>
                    </select>
                
                    <!-- Label for daytour -->
                    <div>
                        <input type="text" class="daytour" id="daytour-text-<?php echo $id; ?>" placeholder="Daytour" disabled>
                    </div>
                </div>
                
                <button class="add-itinerary-btn" id="add-itinerary-btn-<?php echo $id; ?>"  data-id="<?php echo $id; ?>" onclick="checkNumDays(<?php echo $id; ?>, this)">Add to Itinerary</button>
                <button class="remove-itinerary-btn" id="remove-itinerary-btn-<?php echo $id; ?>"  data-id="<?php echo $id; ?>" onclick=" removeFromItinerary(<?php echo $id; ?>, this)">Added</button>
                <button class="save-itinerary-btn" id="save-itinerary-btn-<?php echo $id; ?>"  data-id="<?php echo $id; ?>" onclick="checkNumDays(<?php echo $id; ?>, this)">Save</button>
                <button class="cancel-itinerary-btn" id="cancel-itinerary-btn-<?php echo $id; ?>"  data-id="<?php echo $id; ?>" onclick="cancelItineraryCardChanges(<?php echo $id; ?>)">Cancel</button>

            </div>
        </div>
        
        <?php
            }
        } else {
            echo "<p>No destinations found.</p>";
        }
        ?>
    </div>
<!-- Ensure the script is placed at the end of the body -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ids = <?php echo json_encode($ids); ?>;
    console.log('IDs:', ids); // Debugging: Check if IDs are correctly passed

    ids.forEach(function(id) {
        calculateCost(id);
    });
    return true;
});

</script>

<!-- Footer -->
<footer class="footer">
    <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>

</body>
</html>