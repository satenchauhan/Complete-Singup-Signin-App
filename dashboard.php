<!-- ==================TOP================= -->
<?php require_once('inc/top.php'); 
if (!isset($_SESSION['loggedin'])) {
  header('location: index.php');
}
?>

<body style="padding: 5px;">
<!-- ================HEADER NAVBAR CONTENTS========= -->
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
    <div class="container-fluid" style="margin-top: 40px;">
     <div class="row">
      <div class="col-md-12">
      <h3>Admin<small> / Dashboard</small></h3><hr>
        <?php 
            if(isset($_GET['del'])){  
                echo "<div class='alert alert-success' style='color:green;'><b>Success:</b>User proifle has been deleted !! </div>"; 
              } 
              else if(isset($_GET['updated'])){ 
                echo "<div class='alert alert-success' style='color:green;'><b>Success:</b>User proifle has been updated successfully !!</div>"; }
            ?>    
            <span>
              <h4>Users Profile Details</h4><a href="profile.php" class="btn btn-outline-primary btn-sm float-right">Go to My Profile</a>
            </span>
            <table class="table table-hover table-bordered table-striped table-custom w-80 ">
                  <thead class="btn-primary text-white">
                  <tr>
                    <th>Sr #</th>
                    <th>FullName</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <tr>
                     <?php

                      $dashboard =  new Dashboard();

                      $dashboard->dataview();

                     ?>
                   </tr>         
                 </tbody>
               </table>
              </div>
             </div>            
<?php include('inc/footer.php'); ?>         
 
