<?php 
/**
 * ===================================
 * The User Model Class
 * Handles user-related database tasks 
 * ===================================
 */
class User{
	// Database property
	private $db;

	// User property
	private $user;

	/**
	 * Constructor method
	 * creates a new database object
	 */
	public function __construct(){
		$this->db = new Database;
	}


	/**
	 * User Log in
	 * Checks if the sent in email and sha1 crypted password is matching any row in the database
	 * On success redirect to home page
	 */
	public function login(){
		$email = $_POST['email'];
		$hashedPassword = sha1($_POST['password']);
		try{
			$this->db->query('SELECT * FROM user WHERE email = (:email) && password = (:hashedPassword)');
			$this->db->bind(':email', $email);
			$this->db->bind(':hashedPassword', $hashedPassword);
			$this->db->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}

		// If a row was found (If the user input password and email has same values in the table) return true
		if ($this->db->rowCount() > 0){
			return true; 
		}
		else{
			return false;
		}

	}



}




		
