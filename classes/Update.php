<?php


class Update extends Dbcon{
  
  public function data_by_id($id){
          
          $sql  = "SELECT * FROM `users` WHERE `id` =?";
          $stmt = $this->connect()->prepare($sql);
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_OBJ);
          return $row;
  }

	public function update_data($id, $data){
	      
          $fname    = $_POST['fullname'];
          $username = $_POST['username'];
          $email    = $_POST['email'];
          $country  = $_POST['country'];
          $image    = $_FILES['image']['name'];
          $image_tmp= $_FILES['image']['tmp_name'];
          move_uploaded_file($image_tmp, "dbpic/$image");

          $sql = "SELECT `image` FROM `users` WHERE `id`=?";
          $stmt = $this->connect()->prepare($sql);
          $stmt->bindParam(1, $id, PDO::PARAM_INT);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_OBJ);
          $db_image = $row->image;

         if (empty($image)) { $image= $db_image; }

         if (empty($fname) || empty($username) || empty($email) || empty($country)) {
				       $error ="<div class='alert alert-info' style='color:red;'>All the Fields are Required !!</div>";
               return $error;

			    }else if (strlen($fname) < 4) {
				      $error ="<div class='alert alert-info' style='color:red;'>The Name must contain atleast 3 characters !!</div>";
              return $error;

			    }elseif (strlen($username) < 4) {
				     $error ="<div class='alert alert-info' style='color:red;'>The Username must contain atleast 3 characters !!</div>";
  				   return $error;

			    }else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
      			 $error ="<div class='alert alert-info' style='color:red;'>Please Enter Valid E-mail Address !!</div>";
      			 return  $error;

          }else {

            	$sql ="UPDATE `users` SET `fullname`=?, `username`=?, `email`=?, `country`=?, `image`=? WHERE `id`=?";
            	$stmt = $this->connect()->prepare($sql);
            	$stmt->bindParam(1, $fname, PDO::PARAM_STR);
            	$stmt->bindParam(2, $username, PDO::PARAM_STR);
            	$stmt->bindParam(3, $email, PDO::PARAM_STR);
            	$stmt->bindParam(4, $country, PDO::PARAM_STR);
              $stmt->bindParam(5, $image);
              $stmt->bindParam(6, $id, PDO::PARAM_INT);
            	
                if ($stmt->execute()) {    
                	header("Location:dashboard.php?updated");
                  
                }
                else{
	            	    $error ="<div class='alert alert-danger' style='color:red;'>The data updation failed ??</div>";
	                  return $error;
                }
                   
            } 
        
	  }

}