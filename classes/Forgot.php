<?php

class Forgot extends Dbcon{

	use Find;
    private $token;
    private $id;

	public function sendMail($data)
	{
			$email = $data['email'];

			$check_email = $this->email_check($email);

	  	   if (empty($email)) {
	  		    $error ="<div class='alert alert-info'><span style='color:red;'>All the Fields are Required !!</span></div>";
	           return $error;

	  	   }else if(filter_var($email,FILTER_VALIDATE_EMAIL) == false) {
	  		   $error ="<div class='alert alert-info'><span style='color:red;'>Please Enter Valid E-mail Address !!</span></div>";
	  			 return  $error;

	       }elseif ($check_email == false ) {
	           $error ="<div class='alert alert-info'><span style='color:red;'>The E-mail address does not match !!</span></div>";
	           return  $error;

	       }else{

	       		$sql = "SELECT * FROM `users` WHERE  `email`=?";
	       		$stmt = $this->connect()->prepare($sql);
	       		$stmt->bindParam(1,$email);
	       		$stmt->execute();
	       		  if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	       		  	  $this->id = $row->id;
	       		  	  //$token = $row->token;
                      $username = $row->username;
	       		  	  $db_email = $row->email;
	       		  	  $str = "10AbzxsdertyqwopukmnbvchgfhMAZXMNLKPRTY1234567890";
					  $str = str_shuffle($str);
					  $this->token = substr($str, 0, 15);
					  $sql = "UPDATE `users` SET  `token`=? WHERE `id`=?";
					  $stmt = $this->connect()->prepare($sql);
		              //$stmt-> bindParam(1, $this->db_token,PDO::PARAM_STR);
		              $stmt-> bindParam(1, $this->token,PDO::PARAM_STR);
		              $stmt->bindParam(2, $this->id,PDO::PARAM_INT);
		              $stmt->execute();
                
                
			    $url  = "http://localhost/loginoop/reset-password.php?id=".$this->id."&token=".$this->token;
              //$url  = "http://localhost/loginoop/reset-password.php?id=".$this->id;
			 ///$url .= "&token=".$this->token;

				$to   = $email;
				$sub  = "Reset Password<br>";
				$msg  = "<b>From :</b> Saten Chauhan<br>";
				$msg .= "<b>Subject:</b>&nbsp;Reset Password<br>";
				$msg .= 'Hello '.$username. " !<br>";
				$msg .= 'We just recieve a request to send password recovery link<br>';
				$msg .= 'Click on this below given link to reset your password<br>';
				$msg .= '<a href="'. $url .'">&nbsp;click here to reset password</a></br>';
				$msg .= 'If you did not make this request, just ignore this email<br>';
                $header = "From : Saten Chauhan";

                $send = mail($to,$sub,$msg,$header);
                
//*********************************************************************
//---DISPLAY MESSAGE EMAIL VERIFICATION EMAIL MESSAGE ON SAME PAGE-
                   //$msg ="<div class='alert alert-success' style='color:green;'>Please check your E-mail to reset your new password</div>";
	               return $msg;  //---PLEASE comment or delete  THIS return $msg when you run this application online host.
//---/PLEASE UNCOMMENT  THIS  ------
//*********************************************************************


///////////////////////////////Below function is for online host/////////////////
	           if ($send == true){
	           	  $send_msg ="<div class='alert alert-success' style='color:green;'>Please check your E-mail to reset your new password</div>";
	           	  return  $send_msg;

	           }else{
                    $error ="<div class='alert alert-info'><span style='color:red;'>The failed to send e-mail !!</span></div>";
	           	return $error;
	           }
	       }
	    }
	}
}


