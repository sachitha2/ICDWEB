<?php
// UserTools.class.php

require_once 'User.class.php';
require_once 'DB.class.php';

class UserTools {

        // Log the user in.
	// First check to see if the username and password match a row in the database.
	// If it is successful, set the session varialbes and store the user object within.
	
	public function login( $username, $password ) {
		
		$hashedPassword = md5($password);
		$result = mysqli_query("SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword' ");
		
		if ( mysqli_num_rows($result) == 1 ) {
			$_SESSION[ "user" ] = serialize( new User( mysqli_fetch_assoc( $result ) ) );
			$_SESSION[ 'login_time' ] = time();
			$_SESSION[ 'logged_in' ] = 1;
			return true;
		} else {
			return false;
		}
	}
}