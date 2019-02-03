<?php 
 class Registration extends Dbcon{
       
        use Find;

		public function insert($data){
          
			$fullname  = ucwords($_POST['fullname']);
			$uname     = preg_replace('/\s+/','',$_POST['username']);
			$email     = $_POST['email'];
			$ctry      = ucfirst($_POST['country']);
			$password  = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$image     = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, "dbpic/$image");
            
            
            $fname    = filter_var($fullname, FILTER_SANITIZE_STRING);
            $username = filter_var($uname, FILTER_SANITIZE_STRING);
            $country  = filter_var($ctry, FILTER_SANITIZE_STRING);
            $pass     = filter_var($password,FILTER_SANITIZE_STRING);
            $cpass    = filter_var($cpassword,FILTER_SANITIZE_STRING);
	
          
			$check_user = $this->username_check($username);
			$check_email = $this->email_check($email);
      
		   if (empty($fname) || empty($username) || empty($email) || empty($country) || empty($pass) || empty($cpass)) {
				 $error ="<div class='alert alert-info'><span style='color:red;'>All the Fields are Required !!</span></div>";
                 return $error1;

			}else if (!preg_match("/^[a-zA-Z][a-zA-Z\\s]+$/", $fname)) {
				 $error ="<div class='alert alert-info' style='color:red;'>The invalid input characters for fullname field ! <b style='color:green;'>Only alphabets characters allowed !!</b></div>";
                   return $error;

			}else if (strlen($fname) < 3 ) {
				 $error ="<div class='alert alert-info' style='color:red;'>The Name must contain atleast 3 characters !!</div>";
                   return $error;

			}if (preg_match("/[^a-z0-9_-]+/", $username)) {
                  $error ="<div class='alert alert-info' style='color:red;'>The invalid input characters for username !!<b style='color:green;'> Only small case !!</b></div>";
                   return $error;

            }elseif (strlen($username) < 3) {
				 $error ="<div class='alert alert-info' style='color:red;'>The Username must contain atleast 3 characters !!</div>";
  				  return $error;

			}elseif ($check_user == true) {
      			 $error ="<div class='alert alert-info' style='color:red;'>The Username already have been  Registered</div>";
      			 return $error; 

   			}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      			 $error ="<div class='alert alert-info' style='color:red;'>Please Enter Valid E-mail Address !!</div>";
      			 return  $error;

            }else if ($check_email == true ){
       			$error ="<div class='alert alert-info' style='color:red;'>The E-mail address is already registered !!</div>";
       			return  $error;

    		}else if (!preg_match("/^[a-zA-Z][a-zA-Z\\s]+$/", $country)) {
				 $error ="<div class='alert alert-info' style='color:red;'>The invalid input characters for country name field ! <b style='color:green;'>Only alphabets allowed !!</b></div>";
                   return $error;

			}else if (strlen($pass) < 6 ){
       			 $error ="<div class='alert alert-info' style='color:red;'>The Password can not be less than 6 digits !!</div>";
       			 return  $error;

    		}else if($pass != $cpass){
       			 $error = "<div class='alert alert-info' style='color:red;'>The Password does not match !!</div>";
       			 return $error;

    		}else{

    			 $str = "10AbzxsdertyqwopukmnbvchgfhMAZXMNLKPRTY1234567890";
				 $str = str_shuffle($str);
				 $token = substr($str, 0, 15);
                 $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
      			 $sql = "INSERT INTO `users` (`fullname`,`username`,`email`,`country`,`image`,`token`, `password`) VALUES(:fullname,:username,:email,:country,:image,:token,:password)";
      			 $stmt=$this->connect()->prepare($sql);
      			 $stmt->bindparam(":fullname",$fname,PDO::PARAM_STR);
				 $stmt->bindparam(":username",$username,PDO::PARAM_STR);
				 $stmt->bindparam(":email",$email,PDO::PARAM_STR);
				 $stmt->bindparam(":country",$country,PDO::PARAM_STR);
				 $stmt->bindparam(":image",$image);
				 $stmt->bindparam(":token",$token);
				 $stmt->bindparam(":password",$hashed_pass,PDO::PARAM_STR);
				 $result = $stmt->execute();       

					if ($result) {
	                  
	                    header("Location: index.php?success");
						
					}else{
						$error = "<div class='alert alert-info' style='color:red;'>Sorry !! The Your Registration is Failed !!</div>";
						return $error;

					}

    		}

	 }

 }

