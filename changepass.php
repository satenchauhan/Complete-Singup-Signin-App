<?php require_once("inc/top.php");
if (!isset($_SESSION['loggedin'])) {
  header('location: index.php');
}

 
if (isset($_POST['changepass']) && isset($_GET['pass_id'])){

    $user= new Changepass();
    $user = $user->change_password($_POST);
}

?>

<body style="padding: 5px;">
   <nav class="navbar navbar-expand-lg fixed-top">
     <div class="container">
        <a class="navbar-brand text-white" href="#">Login System</a>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="margin-left: 400px;">
          <ul class="navbar-nav float-right">
             <li class="nav-item">
              <a class="nav-link text-white" href="#">Welcome:&nbsp;<?php echo ucwords($_SESSION['loggedin']['fullname']); ?></a>
              </li>&nbsp;&nbsp;
            <li class="nav-item" >
              <a class="nav-link text-white" href="logout.php">Logout</a>
            </li>
           </ul> 
         </div>
        </div>
       </nav>
      <br>
      <div class="container w-50 main">
       <center><h1 class="bg-primary text-white form-control head">Change Password</h1>
       </center><br>

        <form action="" method="POST">
        <center><?php if(isset($user)) { echo $user; } ?></center>
        <div class="form-group">
          <label for="oldpassword">Old Password:</label>
          <input type="password" class="form-control" name="oldpassword" id="password" placeholder="Enter Your Password">
         </div>
         <div class="form-group">
          <label for="npassword">New Password:</label>
          <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Enter Your Password">
         </div>
         <div class="form-group">
          <label for="cpassword">Confirm Password:</label>
          <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Re-Enter Your Password">
         </div><br><br>
         <div class="form-group">
          <center><button type="submit" name="changepass" class="btn btn-primary">Save Changes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <button class="btn btn-primary "><a href="profile.php" class="text-white">Cancel</a></button> 
          </center>
         </div>
        </form>
        
       </div>
</body>
</html>