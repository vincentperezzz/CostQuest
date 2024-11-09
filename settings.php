<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Settings </title>
    <link rel="stylesheet" href="css/dashboard.css">
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
                    <li><a href="settings.php" class="menu-btn"><b>Settings</b></a></li>
                    <li><a href="search.php" class="menu-btn">Search</a></li>
                </ul>

                <div class="logo"><a href="#home"><img src="icons/logo.png"></a>
                </div>

            
                <div class="itinerary">
                <div class="itinerary-btn">Itinerary</div>
                <div class="itinerary-btn-box"><a href="#itineraries"><img class="loc-ico" src="icons/itineraries-location-icon.png">0</a></div>
                </div>
            </div>

        </nav>
<!------------Home------------->
<?php
    session_start();
    if (isset($_SESSION['first_name']) && isset($_SESSION['email'])) {
        $first_name = $_SESSION['first_name'];
        $email = $_SESSION['email'];
        echo "<br> <br> <br> <br> <br> <br> <p>Welcome, $first_name ($email)</p>";
    } else {
        echo "<p>Welcome, Guest</p>";
    }
    ?>
</body>
</html>
    