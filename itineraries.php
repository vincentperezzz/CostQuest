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
    <div class="itineraries-budget-box" id="itineraries-budget-box">
      <div class="budget-summary-rows" style="margin: 15px 30px;">
          <div class="itineraries-budget-title">Budget</div>
          <div class="budget-limit-text"><div class="text-gray"> out of </div>₱ <div id="budget-limit-text"><?php echo number_format($user_budget, 2); ?> </div></div>
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
        <img src="icons/<?php echo $budget_percentage > 100 ? 'over-budget.png' : 'within-budget.png'; ?>">
    </div>
  </div>
</div>
<script> updateBudgetPercentage(); </script>

<div class="itineraries-container">
<div class="budget-title">Itinerary List</div>

<?php
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = isset($row['name']) ? $row['name'] : 'Unknown Destination';
    $address = isset($row['address']) ? $row['address'] : 'Unknown Address';
    $daytour_price = isset($row['daytour_price']) ? $row['daytour_price'] : 0;
    $overnight_price = isset($row['overnight_price']) ? $row['overnight_price'] : 0;
    $environmental_fee = isset($row['environmental_fee']) ? $row['environmental_fee'] : 0;
    $other_fees = isset($row['other_fees']) ? $row['other_fees'] : 0;
    $total_estimated_cost = isset($row['total_estimated_cost']) ? $row['total_estimated_cost'] : 0;
    $image_filename = isset($row['image_filename']) ? $row['image_filename'] : 'default.png';
    $image = "icons/" . $image_filename;
    $town = isset($row['town']) ? strtolower(str_replace(' ', '', $row['town'])) : 'unknown';
?>

<!-- CARD -->
<div class="itineraries-card" id="destination-<?php echo $id; ?>" data-daytour-price="<?php echo $daytour_price; ?>" data-overnight-price="<?php echo $overnight_price; ?>" data-environmental-fee="<?php echo $environmental_fee; ?>" data-other-fees="<?php echo $other_fees; ?>" data-total-estimated-cost="<?php echo $total_estimated_cost; ?>" data-location-type="<?php echo $location_type; ?>">

    <div class="itineraries-card-img">
        <img src="<?php echo $image; ?>">
    </div>

    <div class="itineraries-card-text">
        <div>
            <div class="itineraries-card-title"><?php echo $name; ?></div>
            <div class="itineraries-card-subtitle"><?php echo trim($address);?></div>
        </div>

        <div class="itineraries-card-price">
            <div class="itineraries-card-price-text">
                <div class="text-gray">from </div>
                <div class="price-text" id="total-cost-<?php echo $id; ?>">₱ <?php echo number_format($total_estimated_cost, 2); ?></div>
            </div>

            <div class="itineraries-card-dropdown">
                <!-- Dropdown for number of people -->
                    <select id="num-people-<?php echo $id; ?>" name="num-people" onchange="calculateCost(<?php echo $id; ?>); editItineraryCard(<?php echo $id; ?>);" class="styled-dropdown" required>
                    <option value="" disabled selected>Number of People</option>
                    <?php for ($i = 1; $i <= 100; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'person' : 'people'; ?></option>
                    <?php endfor; ?>
                </select>
                <!-- Dropdown for days to stay with onchange event -->
                <select id="num-days-<?php echo $id; ?>" name="num-days-<?php echo $id; ?>" onchange="calculateCost(<?php echo $id; ?>); updateDaytourText(<?php echo $id; ?>); editItineraryCard(<?php echo $id; ?>);" class="styled-dropdown" required>
                <option value="" disabled selected>Days to Stay</option>
                    <?php for ($i = 1; $i <= 100; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'day' : 'days'; ?></option>
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
            <button type="submit" class="view-itinerary-btn" id="view-itinerary-btn-<?php echo $id; ?>" onclick="window.location.href='<?php echo $town; ?>.php?scrollTo=destination-<?php echo $id; ?>'">View Details</button>
            <button type="submit" class="remove-itinerary-btn" id="remove-itinerary-btn-<?php echo $id; ?>" onclick="removeFromItineraryPHP(<?php echo $id; ?>, this)">Remove</button>

            <button type="submit" class="save-itinerary-btn" id="save-itinerary-btn-<?php echo $id; ?>" onclick="saveItineraryCardChanges(<?php echo $id; ?>, this)">Save</button>
            <button type="submit" class="cancel-itinerary-btn" id="cancel-itinerary-btn-<?php echo $id; ?>" onclick="cancelItineraryCardChanges(<?php echo $id; ?>)">Cancel</button>
    </div>         
</div>




<?php
}
if ($result->num_rows == 0) {
    echo "<br> <br> <p>No destinations found.</p>";
}
?>
    </div> 

    <!-- Footer -->
    <footer class="footer">
        <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
    </footer>
    <script src="javascript/index.js"></script>
</body>
</html>