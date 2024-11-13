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
$sql = "SELECT * FROM destinations WHERE town_name = 'San Juan'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="css/destination.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <script src="javascript/index.js"> </script>
    </head>

<body>  
    <nav class="navbar">
        <div class="max-width">
            <ul class="menu">
                <li><a href="dashboard.php" class="menu-btn">Home</a></li>
                <li><a href="settings.php" class="menu-btn">Settings</a></li>
                <li><a href="search.php" class="menu-btn"><b>Search</b></a></li>
            </ul>

            <div class="logo"><a href="dashboard.php"><img src="icons/logo.png"></a>
            </div>

            <div class="itinerary">
            <div class="itinerary-btn">Itinerary</div>
            <div class="itinerary-btn-box"><a href="#itineraries"><img class="loc-ico" src="icons/itineraries-location-icon.png">0</a></div>
            </div>
        </div>
    </nav>

<!-- San Juan Destinations -->
<div class="sanjuan-img">
    <img src="icons/search-sanjuan.png">
</div>

<!-- Wrapper for all destination containers -->
<div class="destination-wrapper">
    <!-- Destination 1 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d1.png">
        </div>

        <div class="details">
            <h2 class="name">
                <a href="https://camplaiyabeach.com" target="_blank">Camp Laiya Beach Farm Resort</a>
            </h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: ₱1000 per head</li>
                <li>Overnight Price: ₱1250 per head</li>
                <li>Environmental Fee: ₱20</li>
                <li>Other Fees: ₱150</li>
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

    <!-- Destination 2 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d2.png">
        </div>

        <div class="details">
            <h2 class="name">
                <a href="https://www.facebook.com/@sigayanbay" target="_blank">Sigayan Bay Beach Resort</a>
            </h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: ₱1000 per head</li>
                <li>Overnight Price: ₱2000 per head</li>
                <li>Environmental Fee: ₱150</li>
                <li>Other Fees: ₱200</li>
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

    <!-- Destination 3 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d3.png">
        </div>

        <div class="details">
            <h2 class="name">
                <a href="https://acuaverderesort.com.ph" target="_blank">Acuaverde Beach Resort and Hotel</a>
            </h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: ₱1850 per head</li>
                <li>Overnight Price: ₱3000 per head</li>
                <li>Environmental Fee: N/A</li>
                <li>Other Fees: N/A</li>
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

    <!-- Destination 4 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d4.png">
        </div>

        <div class="details">
            <h2 class="name">
                <a href="https://acuaticoresort.com.ph" target="_blank">Acuatico Beach Resort and Hotel</a>
            </h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: ₱1500 per head</li>
                <li>Overnight Price: ₱3850 per head</li>
                <li>Environmental Fee: N/A</li>
                <li>Other Fees: N/A</li>
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

    <!-- Destination 5 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d5.png">
        </div>

        <div class="details">
            <h2 class="name">
                <a href="https://www.facebook.com/LaiyaAdventurePark" target="_blank">Laiya Adventure Park<a>
            </h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: ₱50 per head</li>
                <li>Overnight Price: N/A</li>
                <li>Environmental Fee: ₱50</li>
                <li>Other Fees: ₱50</li>
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

    <!-- Destination 6 -->
    <div class="destination-container">
        <div class="destination-img">
            <img src="icons/sanjuan-d6.png">
        </div>

        <div class="details">
            <h2 class="name">San Juan Nepomuceno Parish Church</h2>
            <p class="direction">Drop by the Municipal Tourism Reception/Checkpoint
                (drive-in toll -- along San Juan-Laiya Rd.) Brgy. Buhaynasapa, San Juan, Batangas</p>
            
            <ul class="pricelist">
                <li>Daytour Price: Free</li>
                <li>Overnight Price: N/A</li>
                <li>Environmental Fee: N/A</li>
                <li>Other Fees: N/A</li>
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
</div>

<script>
// Function to generate options for dropdowns with 1 to 50 options
function generateOptionsForAll() {
    // Select all dropdowns with class 'people' and 'days'
    document.querySelectorAll('.people, .days').forEach((select) => {
        for (let i = 1; i <= 50; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            select.appendChild(option);
        }
    });
}

// Call the function to populate options for all dropdowns
generateOptionsForAll();

// Update daytour text based on selected days for each destination
document.querySelectorAll('.days').forEach((daysSelect, index) => {
    daysSelect.addEventListener('change', function () {
        // Get the corresponding daytour input for the same destination container
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