<?php require_once("inc/top.php");
if (!isset($_SESSION['loggedin'])) {
  header('location: index.php');
}

?>
<body style="padding: 5px;">
<!-- ================= NAVBAR CONTENTS=============-->

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
     <div class="container-fluid main">
       <div class="row">
        <div class="col-md-2">
         <h4>Profile</h4><h3 class="text-primary"><?php echo ucwords($_SESSION['loggedin']['fullname']); ?></h3>
        </div>
         <div class="col-md-8">
          <center>
            <img src="dbpic/<?php echo $_SESSION['loggedin']['image'] ?>" style="width:35%; box-shadow: 0px 0px 15px 1px rgba(61,57,61,0.97);" class="img-thumbnail" name="profile-image" id="profile-image">
          </center><br>
          </div>
          <div class="col-md-2">
          <span class="float-right">
               <a href="dashboard.php" class="btn btn-outline-primary btn-sm">Dashboard</a>&nbsp;
          </span class="float-right"><br><br>
          <span>
             <a href="update.php?edit_id=<?php echo $_SESSION['loggedin']['id']; ?>" class="btn btn-outline-primary btn-sm float-right">Edit Profile</a>
          </span><br><br>
          <span class="float-right">
            <a href="changepass.php?pass_id=<?php echo $_SESSION['loggedin']['id']; ?>" class="btn btn-outline-primary btn-sm float-right">Change Password</a>
          </span>
        </div>
        </div><br><br>
        <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered">
           <tr>
             <th width="10%" class="btn-primary text-white-dark"><b>User ID:</b></th>
             <td><?= $_SESSION['loggedin']['id']; ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>Country:</b></th>
             <td><?= ucwords($_SESSION['loggedin']['country']); ?></td>
           </tr>
           <tr>
             <th width="15%" class="btn-primary text-white-dark"><b>Full Name:</b></th>
             <td><?= ucwords($_SESSION['loggedin']['fullname']); ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>E-mail:</b></th>
             <td><?= $_SESSION['loggedin']['email']; ?></td>
           </tr>
           <tr>
             <th width="15%" class="btn-primary text-white-dark"><b>Username:</b></th>
             <td><?= ucwords($_SESSION['loggedin']['username']); ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>Joined Date:</b></th>
             <td><?= $_SESSION['loggedin']['joined']; ?></td>
           </tr>
         </table>
      </div>
    </div>
 </div>
<!-- =========FOOTER==================== -->
<?php include('inc/footer.php'); ?>
