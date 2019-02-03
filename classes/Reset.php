<?php

class Reset extends Dbcon{

    use Find;

    private $token;
    private $new_token;
    private $id;
    private $db_token;
    private $match_token;
    private $hasehd_pass;
	public function reset_password($data){
		 $this->token;
		 $this->id;
		 $this->db_token;
		 $this->match_token;
		 $this->hasehd_pass;

 
        $this->id = $_GET['id'];
        $this->token = $_GET['token'];
        $sql = "SELECT * FROM `users` WHERE  `id`=? OR `token`=?";
       	$stmt = $this->connect()->prepare($sql);
       	$stmt->bindParam(1,$this->id);
       	$stmt->bindParam(2,$this->token);
       	$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ); 
		  	$db_id = $row->id;
		  	$this->db_token = $row->token;
                
		$password  = $_POST['password'];
        $cpassword = $_POST['cpassword'];

      //$str ="10AbzxsdertyqwopukmnbvchgfhMAZXMNLKPRTY1234567890";
	  //$str = str_shuffle($str);
		$this->match_token = substr($this->token, 0, 15);
		    
        if (empty($password) || empty($cpassword)) {
	        $error = "<div class='alert alert-danger' style='color:red;'>All The Fields are required !!</div>";
	       return $error;

		}elseif(strlen($password) < 6 ) {
			$error = "<div class='alert alert-danger' style='color:red;'>Your password must be atleast 6 characters !!</div>";
			return $error;

		}elseif($password != $cpassword) {		
			$error = "<div class='alert alert-danger' style='color:red;'>Your password do not match !!</div>";
            return $error;

		}elseif($this->db_token == $this->match_token){
           
            $str = "10AbzxsdertyqwopukmnbvchgfhMAZXMNLKPRTY1234567890";
			$str = str_shuffle($str);
			$this->new_token = substr($str, 0, 15);
		    $this->hasehd_pass = password_hash($password, PASSWORD_DEFAULT); 	
			$sql = "UPDATE `users` SET  `token`=?, `password`=? WHERE `id`=?";
			$stmt = $this->connect()->prepare($sql);
	        //$stmt->bindParam(1, $this->db_token,PDO::PARAM_STR);
	        $stmt->bindParam(1, $this->new_token,PDO::PARAM_STR);
	        $stmt->bindParam(2, $this->hasehd_pass,PDO::PARAM_STR);
	        $stmt->bindParam(3, $this->id,PDO::PARAM_INT);
	   
	        $result = $stmt->execute();

	        header("Location:login.php?success");

	    }else{

	    	$error = "<div class='alert alert-danger' style='color:red;'>Your varification code does not match ??</div>";
	        return $error;
	    }

        
	}

}

