<?php require_once("inc/top.php");

if (isset($_POST['forgot'])) {
 
   $email = $_POST['email'];
   
   $user= new Forgot();
   
   $user = $user->sendMail($_POST);
                 
}

?>
<body style="padding: 5px;">

   <?php require_once("inc/navbar.php"); ?>
   
      <div class="container w-50 main">
        <center><h1 class="bg-primary text-white form-control head">Forgot Password</h1></center><br><br>
        <form action="" method="POST">
          <center><?php if(isset($user)) { echo $user; } ?></center>
           <div class="form-group">
             <label class="name"><h4 class="bg-default">Enter Your Email Address:</h4></label>
             <input type="text" class="form-control" name="email" id="email" placeholder="Please Enter Your Email Address">
           </div><br><br>
           <div class="form-group">
             <center><button type="submit" name="forgot" class="btn btn-primary">Request for New Password</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <button class="btn btn-primary "><a href="index.php" class="text-white">Cancel</a></button> 
            </center>
           </div>
        </form>

         <center><?php //if(isset($msg)) { echo $msg; } ?></center>
       </div>
</body>
</html>