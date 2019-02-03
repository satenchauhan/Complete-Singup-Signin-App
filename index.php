<?php require_once("inc/top.php"); ?>

<body style="padding: 5px;">

 <?php require_once("inc/navbar.php"); ?>
	 
       <div class="container w-100 main">
         <center><h1 class="bg-primary text-white form-control head">Home</h1></center>
        <div class="row">
         <div class="col-md-6"><img src="pic/pic32.jpg" width="100%"></div>
         <div class="col-md-6"><img src="pic/pic37.jpg" width="100%"></div>
        </div>  
           <center>
            <div class='alert alert-success w-100' style='color:green;'>
              <h4 style='color:green;text-align: center;'>
                 <center><?php if(isset($_GET['success'])) { echo "<div class='alert alert-success' style='color:green;'><b>Success:</b> You are registered successfully !!</div>"; } ?></center>
              </h4>
            </div>
           </center>  
          <div class="form-group">
           <center>
             <a href="register.php" class="btn btn-primary">Register</a>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a href="login.php" class="btn btn-primary">Login</a>
           </center>   
          </div>
        </div>

<!-- Source CDN Link -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

 </body>
</html>