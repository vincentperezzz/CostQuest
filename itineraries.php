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
          <button class="edit-budget-btn" id="editButton" onclick="editBudget()">Edit Budget</button>
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
          <div class="itineraries-budget-limit" id="budget-limit">₱ <?php echo number_format($user_budget, 2); ?></div>
          <input type="text" placeholder="₱ 0.00" name="budget-limit-textbox" class="budget-limit-textbox" id="budget-limit-textbox">
      </div>
  </div>
</div>
<script> updateBudgetPercentage(); </script>


  <!------------Footer------------->
  <footer class="footer">
  <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
<script src="javascript/index.js"> </script>
</body>
</html>
    