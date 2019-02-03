
<?php

class Changepass extends Dbcon{

  
     public function change_password($data){
      
                $id = $_GET['pass_id'];
       $oldpassword = $_POST['oldpassword'];
         $npassword = $_POST['npassword'];
         $cpassword = $_POST['cpassword'];
         

        if (empty($oldpassword)|| empty($npassword) || empty($cpassword)) {
           $error ="<div class='alert alert-info'><span style='color:red;'>All the Fields are Required ??</span></div>";
             return $error;

         }else if( $npassword != $cpassword){
           $error = "<div class='alert alert-info'><span style='color:red;'>The Password does not match !!</span></div>";
           return $error;

         }else if(strlen($npassword) < 5 ){
           $error ="<div class='alert alert-info'><span style='color:red;'>The Password can not be less than 5 digits !!</span></div>";
           return  $error;
         }else{

            $sql = "SELECT * FROM `users` WHERE `id`=?";
             $stmt = $this->connect()->prepare($sql);
             $stmt->bindParam(1, $id);
             $stmt->execute();

            if($row = $stmt->fetch(PDO::FETCH_OBJ)){

                 $db_password = $row->password;

                 $de_hashed_pass = password_verify($oldpassword,$db_password);

               if ($de_hashed_pass == $db_password) {
                 $hased_pass = password_hash($npassword,PASSWORD_DEFAULT);
                 $sql = "UPDATE users SET password=? WHERE id=?";
                 $stmt = $this->connect()->prepare($sql);
                 $stmt->bindParam(1, $hased_pass);
                 $stmt->bindParam(2,$id);
                 $stmt->execute();
                 header("Location:profile.php?changed");

                }else{

                  $error = "<div class='alert alert-info'><span style='color:red;'>Error !! The Password does not match !!</span></div>";
                   return $error;
                }

             }

         }

    }

}