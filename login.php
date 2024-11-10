<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CostQuest - Login </title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="javascript/index.js"> </script>
    </head>
<body>   
    <nav class="navbar">
        <div class="max-width">
        <div class="logo"><a href="index.html"><img src="icons/logo.png"></a></div>
        <ul class="menu">
        <li><a class="menu-btn">Don't have an account yet? </a></li>
        <li><a class="menu-btn-box" href="signup.php">Signup</a></li>
        </ul>
        </div>
        </nav>
        </header>
<!------------Login Body------------->
<div id="pageMessages">

</div>
    <div class="login-img">
        <img src="icons/login-1st-img.png"></div>
    
    <div class="login-box">
      <div class="login-form">
        <h1>Login</h1>
        <form action="validate.php" method="post">
          <div class="textbox">
            <input type="email" placeholder="Email" name="email" required>
          </div>
          <div class="textbox">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <input type="submit" class="btn" value="Login">
        </form>
      </div>
    </div>

<!------------Footer------------->
  <footer>
    <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
  </footer>

  <?php
if (isset($_GET['alert']) && $_GET['alert'] == 1) {
    echo "<script> createAlert(' Opps!','','Invalid email or password.','danger',true,true,'pageMessages'); </script>";
}
?>
</body>
</html>
    