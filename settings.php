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
  <?php
  session_start();
  if (isset($_SESSION['first_name']) && isset($_SESSION['email'])) {
      $first_name = $_SESSION['first_name'];
      $email = $_SESSION['email'];
      echo "<h1>Hello, $first_name!</h1>";
  }

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

// Assuming you have the email stored in a session or a variable
$email = $_SESSION['email'];

// Fetch budget from the database
$sql = "SELECT budget FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($budget);
$stmt->fetch();
$stmt->close();
$conn->close();
  ?>  
  </div>

  <div class="budget-box">
    <div class="budget-summary-rows" style="margin: 15px 30px;">
      <div class="budget-title">Budget</div>
      <button class="edit-budget-btn" id="editButton" onclick="editBudget()">Edit Budget</button>
    </div>
    <div class="budget-summary-rows">
      <div class="budget-price">₱ 0.00</div>
      <div class="budget-percentage"> 0%</div>
    </div>
    <div class="budget-summary-rows">
      <div class="progress-bar-grey">
      <div class="progress-bar-status"></div></div>
    </div>
    <div class="budget-limit-box">
      <div class="budget-limit" id="budget-limit" >₱ <?php echo number_format($budget, 2); ?></div>
        <input type="text" placeholder="₱ 0.00" name="budget-limit-textbox" class="budget-limit-textbox" id="budget-limit-textbox">
    </div>
  </div>
</div>




    <div class="settings-box">
      <div class="settings-form">
        <h1>Settings</h1>
        <form action="validate.php" method="post">
          <div class="textbox">
            <input type="email" placeholder="Email" name="email" required>
          </div>
          <div class="textbox">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <input type="submit" class="btn" value="logout">
        </form>
      </div>
    
    </div>   


  <!------------Footer------------->
  <footer class="footer-search">
  <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
</footer>
</body>
</html>
    