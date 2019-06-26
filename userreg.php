<?php

include_once("php/dbconnection.function.php"); 

$email = $_POST["email"];
$pwd = $_POST["password"];
$confirm = $_POST['conpassword'];
$fname = $_POST["firstName"];
$lname = $_POST['lastName'];

if($pwd == $confirm){
	
	$check = dbconnection("spUserCheck('$email')");

	if($check == NULL){
		dbconnection("spNewUser('$email', '$pwd', '$fname', '$lname')");
		header('Location: login.php');
		exit;
	}
	else{
		header('location: register.php?error=2');
		exit;
	}
		
}
else{
	header('location: register.php?error=1');
	exit;

}
	

?>