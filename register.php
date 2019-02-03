<?php require_once("inc/top.php");

 if(isset($_POST['register'])){
   $fname = $_POST['fullname'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $country = $_POST['country'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   
   $user= new Registration();
   $user = $user->insert($_POST);

}
                
?>

<body style="padding: 5px;">

 <?php require_once("inc/navbar.php"); ?>

		<div class="container w-50 main">
    <center><h1 class="bg-primary text-white form-control head">Sign Up for New Account</h1></center>
      <form action="" method="POST" enctype="multipart/form-data">
        <center><?php if(isset($user)) { echo $user; } ?></center>
          <div class="form-group">
            <label for="fullname">Full Name :</label>
            <input type="text" class="form-control" name="fullname" value="<?php if(isset($fname)){ echo $fname; } ?>" id="fullname" placeholder="Please Enter Your Full Name">
            </div>
           <div class="form-group">
            <label for="username">Username :</label>
            <input type="text" class="form-control" name="username" value="<?php if(isset($username)) echo $username;  ?>"  id="username" placeholder="Please Enter Your  Username">
           </div>
           <div class="form-group">
             <label for="email">Email :</label>
             <input type="text" class="form-control" name="email" value="<?php if(isset($email)) echo $email;  ?>" id="email" placeholder="exampl@gmail.com">

           </div>
           <div class="form-group">
             <label for="country">Country :</label>
             <input type="text" class="form-control" name="country" value="<?php if(isset($country)) echo $country;  ?>" id="country" placeholder="Please Enter Country">
           </div>
           <div class="form-group">
             <label for="password">Password :</label>
             <input type="password" class="form-control" name="password" value="<?php if(isset($pass)) echo $pass;  ?>" id="password" placeholder="Please Enter Your Password">
           </div>
           <div class="form-group">
             <label for="cpassword">Confirm Password :</label>
             <input type="password" class="form-control" name="cpassword" value="<?php if(isset($cpass)) echo $cpass;  ?>" id="cpassword" placeholder="Please  Re-Enter Your Password">
           </div>
           <div class="form-group">
            <label for="image"><b>Profile Image :</b></label>
            <input type="file" id="image" class="form-control" name="image" style="height: 44px;">
           </div><br>
            <center><input type="submit" name="register" value="Sign Up" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary">Cancel</a>
            </center> <br>
            <center><a href="login.php"><b>Already Registered</b> !!</a></center>            
      </form>
      </div>   
</body>
</html>
