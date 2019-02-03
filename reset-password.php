<?php require_once("inc/top.php");

if (isset($_POST['reset']) && isset($_GET['id']) && isset($_GET['token']) ){

    $user= new Reset();
    $user = $user->reset_password($_GET);
    
}

?> 
<body style="padding: 5px;">
     <?php require_once("inc/navbar.php"); ?>
      <div class="container w-50 main" >
       <center><h1 class="bg-primary text-white form-control head">Reset Password</h1></center><br>
        <center><?php if(isset($user)){ echo $user; } ?></center>

        <form action="" method="POST">    
         <div class="form-group">
          <label for="password">New Password:</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
         </div>
         <div class="form-group">
          <label for="cpassword">Confirm Password:</label>
          <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Re-Enter Your Password">
         </div><br><br>
         <div class="form-group">
          <center><button type="submit" name="reset" class="btn btn-primary">Reset Password</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <button class="btn btn-primary "><a href="index.php" class="text-white">Cancel</a></button> 
          </center>
         </div>
        </form>        
       </div>
</body>
</html>