<?php

class Login extends Dbcon{

  use Find;
  private $email;
  private $pass;
  private $de_hashed_pass;

	public function user_login($data)
	{
		  $this->email = $_POST['email'];
		  $this->pass = $_POST['password'];

      $check_email = $this->email_check($this->email);
      

  		if (empty($this->email) || empty($this->pass)) {
  		  $error ="<div class='alert alert-info'><span style='color:red;'>All the Fields are Required !!</span></div>";
           return $error;

  	   }else if(filter_var($this->email,FILTER_VALIDATE_EMAIL) == false) {
  			 $error ="<div class='alert alert-info'><span style='color:red;'>Please Enter Valid E-mail Address !!</span></div>";
  			 return  $error;

       }elseif ($check_email != $this->email  ) {
         $error ="<div class='alert alert-info'><span style='color:red;'>The E-mail address does not match !!</span></div>";
         return  $error;
       }
            $sql = "SELECT * FROM `users` WHERE `email`=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1,$this->email, PDO::PARAM_STR);
            $stmt->execute();

            if($row = $stmt->fetch(PDO::FETCH_OBJ)){
           	 $db_email = $row->email;
           	 $this->de_hashed_pass = password_verify($this->pass,$row->password);

             	 if ($this->email == $db_email && $this->de_hashed_pass == $row->password) {
                 	 	  $_SESSION['loggedin'] = [
                 	 			'id'       => $row->id,
                 	 			'fullname' => $row->fullname,
                 	 			'username' => $row->username,
                 	 			'email'    => $row->email,
                 	 			'country'  => $row->country,
                 	 			'image'    => $row->image,
                 	 			'joined'   => $row->joined
             	 	  ];

             	 	  header("Location:profile.php?login");

             	  }else{
             	  	$error = "<div class='alert alert-info'><span style='color:red;'>Login failed !! The E-mail or Password does not match !!</span></div>";
    					     return $error;
             	  }

          }


	  }

}