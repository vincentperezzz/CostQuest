    <?php
  session_start();
  
  // Assuming email is set during login or signup
  if (!isset($_SESSION['email'])) {
      die("Email not set. Please login or signup.");
  }
  
  $email = $_SESSION['email'];
  
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
  
  $sql = "SELECT first_name, last_name, num_people, budget FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($first_name, $last_name, $number_of_people, $budget_amount);
  $stmt->fetch();
  $stmt->close();
  $conn->close();
  
  // Store the data in variables for later use
  $user_first_name = $first_name;
  $user_last_name = $last_name;
  $user_number_of_people = $number_of_people;
  $user_budget = $budget_amount;
  
  // Placeholder value for budget price
  $budget_price = 2500;
  if ($user_budget > 0) {
      $budget_percentage = ($budget_price / $user_budget) * 100;
  } else {
      $budget_percentage = 0;
  }
  ?>