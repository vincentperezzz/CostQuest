<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde:">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CostQuest - Create an Account </title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="icon" href="icons/webicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Reenie+Beanie&display=swap" rel="stylesheet">
    <script src="javascript/index.js"> </script>
    </head>
<body>   
    <nav class="navbar">
        <div class="max-width">
        <div class="logo"><a href="index.html"><img src="icons/logo.png"></a></div>
        <ul class="menu">
        <li><a class="menu-btn">Already have an account? </a></li>
        <li><a class="menu-btn-box" href="login.html">Login</a></li>
        </ul>
        </div>
        </nav>
        </header>
<!------------Login Body------------->
    <div class="login-img">
      <img src="icons/signup-1st-img.png"></div>
            
        <div class="login-box">
            <h1>Create an account here!</h1>
            <form action="register.php" method="post" onsubmit="toggle_Continue_SigningUp(event)">
                <div class="name-row">
                    <div class="textbox">
                        <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="textbox">
                        <input type="text" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
        
                <div class="textbox">
                    <input type="text" placeholder="Email" name="email" required>
                </div>
        
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
        
                <div class="textbox">
                    <input type="password" placeholder="Confirm Password" name="confirm-password" required>
                </div>

                <div class="name-row">
                    <div class="textbox">
                        <label for="num-people" class="label">Number of People Traveling:</label>
                        <select id="num-people" name="num-people" class="styled-dropdown">
                            <?php for ($i = 1; $i <= 100; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo $i == 1 ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                  <label for="budget" class="form-label">Budget Amount:</label>
                  <div class="textbox">
                      <input type="number" id="budget" name="budget" required>
                  </div>
                </div>
        
                <button type="submit" class="btn">Continue</button>
            </form>
        </div>
        
        <!------------Footer------------->
        <footer>
            <h4>Copyright © 2024 CostQuest. All Rights Reserved.</h4>
        </footer>
</body>  
</body>
</html>
    