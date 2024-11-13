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
    <?php include 'php/data_database.php'; ?>
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
        <img src="icons/settings-1st-img.png"></div>

<div class="budget-container">
  <div class="hello-card"> 
  <h1>Hello, <?php echo $user_first_name; ?>!</h1>
  </div>

  <div class="budget-box">
      <div class="budget-summary-rows" style="margin: 15px 30px;">
          <div class="budget-title">Budget</div>
          <button class="edit-budget-btn" id="editButton" onclick="editBudget()">Edit Budget</button>
      </div>
      <div class="budget-summary-rows">
          <div class="budget-price" id="budget-price">₱ <?php echo number_format($budget_price, 2); ?></div>
          <div class="budget-percentage" id="budget-percentage"> <?php echo number_format($budget_percentage, 2); ?>%</div>
      </div>
      <div class="budget-summary-rows">
          <div class="progress-bar-grey">
              <div class="progress-bar-status" id="progress-bar-status" style="width: <?php echo $budget_percentage; ?>%;"></div>
          </div>
      </div>
      <div class="budget-limit-box">
          <div class="budget-limit" id="budget-limit">₱ <?php echo number_format($user_budget, 2); ?></div>
          <input type="text" placeholder="₱ 0.00" name="budget-limit-textbox" class="budget-limit-textbox" id="budget-limit-textbox">
      </div>
  </div>
</div>
<script> updateBudgetPercentage(); </script>



<div class="login-box">
            <h1>Edit account details here!</h1>
            <form action="settings.php" method="post" onsubmit="toggle_Continue_SigningUp(event)">
                <div class="name-row">
                    <div class="textbox">
                        <input type="text" placeholder="<?php echo $first_name ?>" name="fname">
                    </div>
                    <div class="textbox">
                        <input type="text" placeholder="<?php echo $last_name ?>" name="lname">
                    </div>
                </div>
        
                <div class="textbox">
                    <input type="email" placeholder="<?php echo $email ?>" name="email">
                </div>
        
                <div class="textbox">
                    <input type="password" placeholder="Modify Password" name="password" required>
                </div>
        
                <div class="textbox">
                    <input type="password" placeholder="Confirm Password" name="confirm-password" required>
                </div>

                <div class="name-row">
                    <div class="textbox">
                        <label for="num-people" class="label">Number of People Traveling:</label>
                        <select id="num-people" name="num-people" class="styled-dropdown">
                            <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo $i == $user_number_of_people ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
        
                <button type="submit" class="btn">Continue</button>
                <button type="submit" class="logout-btn" onclick="window.location.href='index.html'">Logout</button>
            </form>
            
  </div>
    
 


  <!------------Footer------------->
  <footer class="footer">
  <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
</body>
</html>
    