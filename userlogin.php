<?php

			 include_once("php/dbconnection.function.php");
			 session_start();
			 
				$usernam = $_POST['email'];
				$userpass= $_POST['password'];
				
				$row = dbconnection("spUserLogin('$usernam','$userpass')")[0];
				
				if($row != NULL){
				
					$_SESSION['username'] = $row['UserName'];
					$_SESSION['userpass'] = $row['Password'];
					$_SESSION['uid'] = $row['UID'];
					$_SESSION['usertype'] = $row['State'];
					header('Location: index.php');
				
				}
				else{
					header('location: login.php');
				}		
?>