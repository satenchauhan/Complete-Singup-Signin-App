<?php
session_start();

//require_once './functions/functions.php';

spl_autoload_register(function($class) {

	require_once('classes/' . $class . '.php');

});

