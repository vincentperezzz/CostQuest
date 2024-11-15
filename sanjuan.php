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

// Fetch destinations for San Juan
$sql = "SELECT * FROM destinations WHERE town = 'San Juan'";
$result = $conn->query($sql);

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
    <div class="sanjuan-img">
        <img src="icons/search-sanjuan.png">
    </div>

    <!-- Wrapper for all destination containers -->
    <div class="destination-wrapper">
        <?php
        // Check if there are destinations
        if ($result->num_rows > 0) {
            // Loop through each destination
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $daytour_price = $row['daytour_price'];
                $overnight_price = $row['overnight_price'];
                $environmental_fee = $row['environmental_fee'];
                $other_fees = $row['other_fees'];
                $total_estimated_cost = $row['total_estimated_cost'];
                $image = "icons/sanjuan-d" . $id . ".png";
        ?>
        
        <div class="destination-container">
            <div class="destination-img">
                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                <div class="price-overlay">
                    <p class="from-color">from</p>
                    <h2>₱ <?php echo $total_estimated_cost; ?></h2>
                </div>
            </div>

            <div class="details">
                <h2 class="name">
                    <a href="https://camplaiyabeach.com" target="_blank"><?php echo $name; ?></a>
                </h2>
                <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
                
                <ul class="pricelist">
                    <li>Daytour Price: ₱ <?php echo number_format($daytour_price, 2); ?> per two pax</li>
                    <li>Overnight Price: ₱ <?php echo number_format($overnight_price, 2); ?> per two pax</li>
                    <li>Environmental Fee: ₱ <?php echo number_format($environmental_fee, 2); ?></li>
                    <li>Other Fees: ₱ <?php echo number_format($other_fees, 2); ?></li>
                </ul>

                <div class="dropdown-container">
                    <!-- Dropdown for number of people -->
                    <select class="people" name="people">
                        <option value="" disabled selected>Number of People</option>
                    </select>
                    <!-- Dropdown for days to stay with onchange event -->
                    <select class="days" name="days" onchange="updateDaytourText()">
                        <option value="" disabled selected>Days to Stay</option>
                    </select>
                    <!-- Label for daytour -->
                    <div>
                        <input type="text" class="daytour" name="daytour" placeholder="Daytour" disabled>
                    </div>
                </div>
                
                <button class="add-itinerary-btn">Add to Itinerary</button>
            </div>
        </div>
        
        <?php
            }
        } else {
            echo "<p>No destinations found.</p>";
        }
        ?>
    </div>

<script>
// Function to generate options for dropdowns with 1 to 100 options
function generateOptionsForAll() {
    document.querySelectorAll('.people, .days').forEach((select) => {
        for (let i = 1; i <= 100; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            select.appendChild(option);
        }
    });
}

generateOptionsForAll();

// Update daytour or overnight text based on selected days for each destination
document.querySelectorAll('.days').forEach((daysSelect, index) => {
    daysSelect.addEventListener('change', function () {
        const daytourInput = document.querySelectorAll('.daytour')[index];
        const daysSelected = parseInt(daysSelect.value, 10);

        if (daysSelected === 1) {
            daytourInput.value = "Daytour";
        } else if (daysSelected > 1) {
            daytourInput.value = "Overnight";
        } else {
            daytourInput.value = "";
        }
        daytourInput.disabled = true;
    });
});
</script>

<!-- Footer -->
<footer class="footer">
    <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
    
</body>
</html>