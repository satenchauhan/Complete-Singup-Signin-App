<?php 

 require_once("inc/top.php");
if (!isset($_SESSION['loggedin'])) {
  header('location: index.php');
}

if (isset($_GET['del_id'])){   
   $id = $_GET['del_id'];
}



if (isset($_POST['btn-del'])){ 
   $user =  new Delete();
   $user_del = $user->delete_data($del_id, $_GET);

}
$del_user =  new Update();
$data = $del_user->data_by_id($id);

?>

<body style="padding: 5px;">
<div id="container">
<!-- ================= NAVBAR CONTENTS=============-->
   <nav class="navbar navbar-expand-lg fixed-top">
     <div class="container">
        <a class="navbar-brand text-white" href="#">Login System</a>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
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
      <center>
        <h4><?php if(isset($user_del)){ echo $user_del; } ?></h4>
      </center>
    <div class="container-fluid main">
     <div class="row">
      <div class="col-md-6">
        <h4>Profile</h4><h3 class="text-primary"><?php echo ucwords($data->fullname); ?>
        </h3>
      </div>
      <div class="col-md-6 float-right">
        <form method="POST" action="" class="float-right">
          <button class="btn btn-primary" type="submit" name="btn-del">Delete</button>
          <button type="button"  class="btn btn-danger text-white" ><a href="dashboard.php" class="text-white">&nbsp;Cancel</a></button>
        </form>
      </div>
      </div>
        <center><img src="dbpic/<?php echo $data->image; ?>" style="width:35%; box-shadow: 0px 0px 15px 1px rgba(61,57,61,0.97);" class="img-thumbnail" name="profile-image" id="profile-image"></center>

<!-- =================PAGE CONTENTS================== -->
    
     <div class="row">
      <div class="col-sm-12">
       <div><center><h3 class="text-primary"><strong>Profile Details</strong></h3></center><br></div>
         <table class="table table-bordered">
           <tr>
             <th width="10%" class="btn-primary text-white-dark"><b>User ID:</b></th>
             <td  class="text-primary"><?php echo $data->id;   ?></td>
             <th width="10%" class="btn-primary text-white-dark"><b>Country:</b></th>
             <td  class="text-primary"><?php echo ucfirst($data->country);  ?></td>
           </tr>
           <tr>
             <th width="10%" class="btn-primary text-white-dark"><b>Full Name:</b></th>
             <td class="text-primary"><?php echo ucwords($data->fullname);  ?></td>
             <th width="10%" class="btn-primary text-white-dark"><b>E-mail:</b></th>
             <td class="text-primary"><?php echo $data->email; ?></td>
           </tr>
           <tr>
             <th width="10%" class="btn-primary text-white-dark"><b>Username:</b></th>
             <td class="text-primary"><?php echo ucfirst($data->username); ?></td>
             <th width="10%" class="btn-primary text-white-dark"><b>Joined Date:</b></th>
             <td class="text-primary"><?php echo $data->joined; ?></td>
           </tr>
         </table>
        </div>
       </div>

     </div>
<!-- =========FOOTER==================== -->
<?php include('inc/footer.php'); ?>
