<?php

require 'mysql.php';

class membership {
	
	function validateUser($username, $password) {
		//salts used to add more security to the passwords, randomly generated using something like mt_srand() would be better but I couldn't figure it out :(
		include 'salts.php';
		$mysql = new mysql();
		$ensure_credentials = $mysql->verifyUsernamePass($username, hash('sha512', $password . $P_SALT . $S_SALT));
		
		if($ensure_credentials) {
			$_SESSION['status'] = 'authorized';
			header("location: index.php");
		} else return "Login not verified, please try again"; //don't be specific
		
	} 
	
	//logout 
	function logOut() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() + 3600);
				session_destroy();
		}
	}
	
	//if verfied then take the user back
	function confirmMember() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
}