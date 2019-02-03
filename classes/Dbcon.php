<?php

class Dbcon{

			private $hostname;
			private $username;
			private $password;
			private $dbname;

			public  function connect()
			{
					$this->hostname= "localhost";
					$this->username= "root";
					$this->password= "";
					$this->dbname = "loginoop";
				   					    
			     try{
						$conn = "mysql:host=".$this->hostname.";dbname=".$this->dbname;
					    $dbconn = new PDO($conn, $this->username, $this->password);
					    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    $dbconn->exec("SET CHARACTER SET utf8");
					    //echo "Connected............!!!!";

					    return $dbconn;

					}catch(PDOException $msg) {

						die ("Connection is failed while it was trying to connect with database ? ? ?");
						
					}

			}

}

