<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <?php include 'php/data_database.php'; ?>
    <script src="javascript/index.js"> </script>
    </head>
<body>  
        <nav class="navbar">
            <div class="max-width">
                <ul class="menu">
                    <li><a href="dashboard.php" class="menu-btn"><b>Home</b></a></li>
                    <li><a href="settings.php" class="menu-btn">Settings</a></li>
                    <li><a href="search.php" class="menu-btn">Search</a></li>
                </ul>

                <div class="logo"><a href="dashboard.php"><img src="icons/logo.png"></a>
                </div>

            
                <div class="itinerary">
                    <div class="itinerary-btn">Itinerary Cart</div>
                    <div class="itinerary-btn-box"><a href="itineraries.php"><img class="loc-ico" src="icons/itineraries-location-icon.png"><?php echo $number_of_destinations; ?></a></div>
                </div>
            </div>

        </nav>
<!------------Home------------->
<div class="dashboard-img">
      <img src="icons/dashboard-1st-img.png"></div>

      <div class="best-choice-container">
        <a href="sanjuan.php?scrollTo=destination-1" class="best-choice-link">
            <div class="best-choice-card">
                <img src="icons/best-choice-img-1.png">
                <div class="best-choice-title">Camp Laiya Beach Farm Resort</div>
                <div class="best-choice-subtitle">San Juan, Batangas</div>
                <div class="best-choice-time">
                    <img src="icons/clock-icon.svg">
                    <p>Daytour and Overnight</p>
                </div>
                <div class="best-choice-price">
                    <div class="best-choice-subtitle">From <h4> ₱ 8,789</h4> 
                    <div class="best-choice-title">₱ 2,300</div></div>     
                </div>
            </div>
        </a>
    
        <a href="taal.php?scrollTo=destination-13" class="best-choice-link">
            <div class="best-choice-card">
                <img src="icons/best-choice-img-2.png">
                <div class="best-choice-title">Taal Volcano</div>
                <div class="best-choice-subtitle">Taal, Batangas</div>
                <div class="best-choice-time">
                    <img src="icons/activity-icon.svg">
                    <p>Hike and Explore</p>
                </div>
                <div class="best-choice-price">
                    <div class="best-choice-subtitle">From
                    <div class="best-choice-title">₱ 2,050</div></div>     
                </div>
            </div>
        </a>
      </div>

      <div class="popular-container">
        <h1 class="popular-title">Popular Destinations</h1>
        <h4 class="subtitle-container">From historical cities to natural spectaculars, <br> come see the best of the world!</h4>


    <div class="popular-card-container">
      <div class="popular-card-r1-container">
          <a href="sanjuan.php" class="popular-card-link">
              <div class="popular-card-r1">
                  <img src="icons/homepage-sanjuan-card.png">
              </div>
          </a>
          <a href="nasugbu.php" class="popular-card-link">
              <div class="popular-card-r1">
                  <img src="icons/homepage-nasugbu-card.png">
              </div>
          </a>
          <a href="taal.php" class="popular-card-link">
              <div class="popular-card-r1">
                  <img src="icons/homepage-taal-card.png">
              </div>
          </a>
      </div>
  
      <div class="popular-card-r2-container">
          <a href="calatagan.php" class="popular-card-link">
              <div class="popular-card-r2">
                  <img src="icons/homepage-calatagan-card.png">
              </div>
          </a>
          <a href="lipacity.php" class="popular-card-link">
              <div class="popular-card-r2">
                  <img src="icons/homepage-lipacity-card.png">
              </div>
          </a>
          <a href="bauan.php" class="popular-card-link">
              <div class="popular-card-r2">
                  <img src="icons/homepage-bauan-card.png">
              </div>
          </a>
      </div>
  </div>


<div class="tour-package-title">
  <h1 class="popular-title">How about starting with our Tour Packages?</h1>
  <h4 class="subtitle-container">These packages are customized to match users'<br> unique preferences and curated tour lists.</h4>
</div>

<div class="tour-package-container">
    <div class="tour-package-card">
        <img src="icons/tour-package-card-1.png">
        <img src="icons/costquest-logo.svg" class="costquest-logo-card">
        <div class="text-overlay">Traveler’s Favorites<br>Tour Package</div>
        <div class="tour-package-btn">Choose Package</div>
    </div>

    <div class="tour-package-card">
        <img src="icons/tour-package-card-2.png">
        <img src="icons/costquest-logo.svg" class="costquest-logo-card">
        <div class="text-overlay">Historic Landmarks<br>Tour Package</div>
        <div class="tour-package-btn">Choose Package</div>:
    </div>
</div>

</div>


  <!------------Footer------------->
  <footer>
    <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
  </footer>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    updateItineraryStyle(<?php echo $number_of_destinations; ?>, <?php echo $budget_percentage; ?>);
});
</script>
</body>
</html>
    