<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search </title>
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
<!------------Home------------->
<div class="dashboard-img">
        <img src="icons/search-1st-img.png"></div>

    <div class="search-container">
            <div class="textbox">
                <input type="text" name="search" placeholder="" required/>
            </div>
            
            <button type="submit" name="submit-search" class="search-btn">
                <img src="icons/search-ico.svg">Search</button>

            <button type="submit" name="submit-filter" class="filter-btn">
                <img src="icons/filter-ico.svg">Filter</button>
            </div>
    </div>

<!------------Footer------------->
<footer class="footer-search">
  <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
    
</body>
</html>
    