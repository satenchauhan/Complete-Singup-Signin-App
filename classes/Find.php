<?php 

trait Find{

		public function email_check($email){
		  
		   $qry = "SELECT `email` FROM `users` WHERE `email` = :email";
		   $stmt = $this->connect()->prepare($qry);
		   $stmt->bindValue(':email', $email);
		   $stmt->execute();
		   
		   if($stmt->rowCount() > 0 ){

		   	 return true;

		   }else{

		   	return false;

		   }
        }

		public function username_check($username){
		   
		   $qry = "SELECT `username` FROM `users` WHERE `username` = :username";
		   $stmt = $this->connect()->prepare($qry);
		   $stmt->bindValue(':username', $username);
		   $stmt->execute();

		   if($stmt->rowCount() > 0 ){

		       return true;

		   }else{

		      return false;

		   }
        }

      

}

