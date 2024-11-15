<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itineraries</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <?php include 'php/data_database.php'; ?>
    <script src="javascript/index.js"> </script>
    </head>
<body>  
        <nav class="navbar">
            <div class="max-width">
                <ul class="menu">
                    <li><a href="dashboard.php" class="menu-btn">Home</a></li>
                    <li><a href="settings.php" class="menu-btn">Settings</a></li>
                    <li><a href="search.php" class="menu-btn">Search</a></li>
                </ul>

                <div class="logo"><a href="dashboard.php"><img src="icons/logo.png"></a>
                </div>

            
                <div class="itinerary">
                <div class="itinerary-btn"><b>Itinerary Cart</b></div>
                <div class="itinerary-btn-box"><a href="itineraries.php"><img class="loc-ico" src="icons/itineraries-location-icon.png">0</a></div>
                </div>
            </div>

        </nav>
<!------------Home------------->
<div class="dashboard-img">
        <img src="icons/itineraries-1st-img.png"></div>
<div id="pageMessages"> </div>

<div class="itineraries-budget-container">

  <div class="itineraries-budget-box">
      <div class="budget-summary-rows" style="margin: 15px 30px;">
          <div class="itineraries-budget-title">Budget</div>
          <div class="budget-limit-text" id="budget-limit-text"><div class="text-gray"> out of </div>₱ <?php echo number_format($user_budget, 2); ?></div>
      </div>
      <div class="itineraries-budget-summary-rows">
          <div class="itineraries-budget-price" id="budget-price">₱ <?php echo number_format($budget_price, 2); ?></div>
          <div class="itineraries-budget-percentage" id="budget-percentage"> <?php echo number_format($budget_percentage, 2); ?>%</div>
      </div>
      <div class="itineraries-budget-summary-rows">
          <div class="progress-bar-grey">
              <div class="progress-bar-status" id="progress-bar-status" style="width: <?php echo $budget_percentage; ?>%;"></div>
          </div>
      </div>
      <div class="itineraries-budget-limit-box">
          <img src="icons/within-budget.png"></div>
      </div>
  </div>

<script> updateBudgetPercentage(); </script>

<div class="itineraries-container">
<div class="budget-title">Itinerary List</div>

<!-- CARD -->
<div class="itineraries-card">
    <div class="itineraries-card-img">
        <img src="icons/itinerary-card-sanjaun-d1.png">
    </div>

    <div class="itineraries-card-text">
        <div>
            <div class="itineraries-card-title">Camp Laiya Beach Farm Resort</div>
            <div class="itineraries-card-subtitle">San Juan, Batangas</div>
        </div>

        <div class="itineraries-card-price">
            <div class="itineraries-card-price-text">
                <div class="text-gray">from </div>
                <div class="price-text">₱ 1,000.00</div>
            </div>

            <div class="itineraries-card-dropdown">
                    <!-- Dropdown for number of people -->
                    <select id="num-people-<?php echo $id; ?>" name="num-people" class="styled-dropdown">
                        <option value="" disabled selected>Number of People</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Dropdown for days to stay with onchange event -->
                    <select id="num-days-<?php echo $id; ?>" name="num-days-<?php echo $id; ?>" class="styled-dropdown" onchange="updateTotalCost(<?php echo $id; ?>); updateDaytourText(<?php echo $id; ?>)">
                        <option value="" disabled selected>Days to Stay</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Label for daytour -->
                    <div>
                        <input type="text" class="daytour" id="daytour-text-<?php echo $id; ?>" placeholder="Daytour" disabled>
                    </div>
            </div>
        </div>
    </div>
    <div class="itineraries-btn-row">
        <div>
            <button type="submit" class="view-itinerary-btn" onclick="">View Details</button>
        </div>
        <div>
            <button type="submit" class="remove-itinerary-btn" onclick=")">Remove</button>
        </div>
    </div>         
</div>


<!-- CARD -->
<div class="itineraries-card">
    <div class="itineraries-card-img">
        <img src="icons/itinerary-card-sanjaun-d1.png">
    </div>

    <div class="itineraries-card-text">
        <div>
            <div class="itineraries-card-title">Camp Laiya Beach Farm Resort</div>
            <div class="itineraries-card-subtitle">San Juan, Batangas</div>
        </div>

        <div class="itineraries-card-price">
            <div class="itineraries-card-price-text">
                <div class="text-gray">from </div>
                <div class="price-text">₱ 1,000.00</div>
            </div>

            <div class="itineraries-card-dropdown">
                    <!-- Dropdown for number of people -->
                    <select id="num-people-<?php echo $id; ?>" name="num-people" class="styled-dropdown">
                        <option value="" disabled selected>Number of People</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Dropdown for days to stay with onchange event -->
                    <select id="num-days-<?php echo $id; ?>" name="num-days-<?php echo $id; ?>" class="styled-dropdown" onchange="updateTotalCost(<?php echo $id; ?>); updateDaytourText(<?php echo $id; ?>)">
                        <option value="" disabled selected>Days to Stay</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Label for daytour -->
                    <div>
                        <input type="text" class="daytour" id="daytour-text-<?php echo $id; ?>" placeholder="Daytour" disabled>
                    </div>
            </div>
        </div>
    </div>
    <div class="itineraries-btn-row">
        <div>
            <button type="submit" class="view-itinerary-btn" onclick="">View Details</button>
        </div>
        <div>
            <button type="submit" class="remove-itinerary-btn" onclick=")">Remove</button>
        </div>
    </div>         
</div>

<!-- CARD -->
<div class="itineraries-card">
    <div class="itineraries-card-img">
        <img src="icons/itinerary-card-sanjaun-d1.png">
    </div>

    <div class="itineraries-card-text">
        <div>
            <div class="itineraries-card-title">Camp Laiya Beach Farm Resort</div>
            <div class="itineraries-card-subtitle">San Juan, Batangas</div>
        </div>

        <div class="itineraries-card-price">
            <div class="itineraries-card-price-text">
                <div class="text-gray">from </div>
                <div class="price-text">₱ 1,000.00</div>
            </div>

            <div class="itineraries-card-dropdown">
                    <!-- Dropdown for number of people -->
                    <select id="num-people-<?php echo $id; ?>" name="num-people" class="styled-dropdown">
                        <option value="" disabled selected>Number of People</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Dropdown for days to stay with onchange event -->
                    <select id="num-days-<?php echo $id; ?>" name="num-days-<?php echo $id; ?>" class="styled-dropdown" onchange="updateTotalCost(<?php echo $id; ?>); updateDaytourText(<?php echo $id; ?>)">
                        <option value="" disabled selected>Days to Stay</option>
                        <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- Label for daytour -->
                    <div>
                        <input type="text" class="daytour" id="daytour-text-<?php echo $id; ?>" placeholder="Daytour" disabled>
                    </div>
            </div>
        </div>
    </div>
    <div class="itineraries-btn-row">
        <div>
            <button type="submit" class="view-itinerary-btn" onclick="">View Details</button>
        </div>
        <div>
            <button type="submit" class="remove-itinerary-btn" onclick=")">Remove</button>
        </div>
    </div>         
</div>




</div>
  <!------------Footer------------->
  <footer class="footer">
  <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
<script src="javascript/index.js"> </script>
</body>
</html>
    