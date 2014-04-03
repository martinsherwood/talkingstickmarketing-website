<?php

require_once 'includes/constants.php';

class mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	
	function verifyUsernamePass($username, $password) {
				
		$query = "SELECT *
				FROM admins
				WHERE username = ? AND password = ?
				LIMIT 1"; //limit to 1 for security
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $username, $password); //username and password are both strings
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}	
	}
}

