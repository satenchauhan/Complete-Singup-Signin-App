<?php require_once("inc/top.php");

  if (isset($_POST['login'])) {
    
      $user= new Login();
      $user = $user->user_login($_POST);
  }
?>

<body style="padding: 5px;">
 <?php require_once("inc/navbar.php"); ?>

		   <div class="container w-50 main">
       <center><h1 class="bg-primary text-white form-control head">Login</h1></center><br>
      
        <form action="" method="POST">
           <center></center>
           <center><?php  if(isset($user)) { echo $user; } else if(isset($_GET['success'])) { echo "<div class='alert alert-success' style='color:green;'><b>Success:</b> Your new password has been reset please !!<b> Login Again</b></div>"; } ?></center>
           <div class="form-group">
             <label class="email">Email:</label>
             <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
           </div><br>
           <div class="form-group">
              <label class="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
           </div>
           <div class="form-group">
            <center><input type="submit" name="login" class="btn btn-primary" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary"><a href="index.php" class="text-white">Back to Home</a></button><br><br>
            <a href="forgot-password.php" class="primary">Forgot Password ?</a></center>
           </div>
          </form>
         </div>
</body>
</html>