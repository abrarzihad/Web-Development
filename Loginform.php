<!DOCTYPE html>
<html>
  <head>
    <title>Career Consultancy</title>
    <link rel="stylesheet" href="lf.css">
  </head>
  <body>
<?php
        if(isset($_SESSION['message'])){
            echo "<h4>" . $_SESSION['message'] . "</h4>";
        }
    ?>



<div class="login-box">
  <h1>Login</h1>
  <form action="logincheck.php" method="post">
  <div class="textbox">
   <i class="fas fa-user"></i>
 
    <input type="text" name="email" placeholder="email">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password">
  </div>

  <input type="submit" name="submit" class="btn" value="Sign in">
	</form>
  <a href="#" class="fyp">Forgot your password?</a>
  <br>
  Don't have an account?<a href="registration.php" target="_blank" class="fyp">Sign up</a>
</div>
  </body>
</html>
