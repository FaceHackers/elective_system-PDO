<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>登入系統</title>
    <link rel="stylesheet" href="<?= $config->cssRoot ?>reset.css">
    <link rel="stylesheet" href="<?= $config->cssRoot ?>style.css">
     <!-- This is alert -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    
   </head>
  <body>
    <div class="container">
      <div class="login">
  	    <h1 class="login-heading">
        <strong>Welcome.</strong> Please login.</h1>
        <form method="post" id="form" name="reg" action="login" onsubmit="return check()">
          <input type="text" name="user" placeholder="Username"  class="input-txt" autocomplete="off" required/>
          <input type="password" name="password" placeholder="Password"  class="input-txt" autocomplete="off" required/>
      <div class="login-footer">
            <button type="submit" name="check" class="btn btn--right" >Sign in</button>
      </div>
      <br>
      <br>
     
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  </body>
<?php
 if(isset($_SESSION['alert'])) {
   echo "<script>alert('" .$_SESSION['alert'] . "');</script>";
   unset($_SESSION['alert']);
 }
?>
</html>

