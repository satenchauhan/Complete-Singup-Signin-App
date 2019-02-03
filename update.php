<?php 
require_once("inc/top.php"); 

if (!isset($_SESSION['loggedin'])) {
  header('location: index.php');
}

if (isset($_GET['edit_id'])) {   
   $edit_id = $_GET['edit_id'];
}

$user =  new Update();

if (isset($_POST['update'])){       
   $userupdate= $user->update_data($edit_id, $_GET);

}

$input_data = $user->data_by_id($edit_id);

?>
<body style="padding: 5px;">

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand text-white" href="#">Login System</a>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
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

  <div class="container w-50 main" >
    <center><h1 class="bg-primary text-white form-control head">Update Profile</h1></center>
      <form action="" method="POST" enctype="multipart/form-data">
        <center><?php if(isset($userupdate)) { echo $userupdate; } ?></center>
          <div class="form-group">
             <label for="fullname">Full Name :</label>
             <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $input_data->fullname;   ?>">
           </div>
           <div class="form-group">
             <label for="username">Username :</label>
             <input type="text" class="form-control" name="username" id="username" value="<?php  echo $input_data->username;  ?>">
           </div>
           <div class="form-group">
             <label for="email">Email :</label>
             <input type="text" class="form-control" name="email" id="email" value="<?php  echo $input_data->email; ?>">
           </div>
           <div class="form-group">
             <label for="country">Country :</label>
             <input type="text" class="form-control" name="country" value="<?php  echo $input_data->country;  ?>">
           </div>   
           <div class="form-group">
             <label for="image"><b>Profile Image :</b></label>
             <input type="file" id="image" class="form-control" name="image" style="height: 44px;">
           </div><br>
            <center><input type="submit" name="update" value="Save Changes" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="dashboard.php" class="btn btn-primary">Cancel</a>
            </center> <br>             
        </form>
       </div>   
</body>
</html>
