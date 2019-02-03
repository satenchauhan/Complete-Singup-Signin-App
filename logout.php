<?php

require_once 'common/init.php';

session_start();

if(isset($_SESSION['loggedin'])){

	$_SESSION = []; //asining empty array

    //espiring cookie
	setcookie(session_name(), session_id(), time()-1000,"/");
	//this will delete the session from diratory
	session_destroy();
	
	header('location: index.php');
}
else{

	header('location: index.php?error=Please login to your account');

}