<?php 
/**
 * ==================
 * The Article Class
 * - handles articles 
 * ==================
 */
class Article{
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
	 * Add Article to Database
	 */
	public function addArticle(){
		$title = $_POST['title'];
		$body = $_POST['body'];
		$lat = $_POST['latitude'];
		$lng = $_POST['longitude'];
		// Insert User
		$this->db->query('INSERT INTO article (title, body, lat, lng) VALUES (:title, :body, :lat, :lng)');
		//Bind Values
		$this->db->bind(':title', $title);
		$this->db->bind(':body', $body);
		$this->db->bind(':lat', $lat);
		$this->db->bind(':lng', $lng);

		//Execute
		$this->db->execute();

		return true;
	}




	/**
	 * Get all Articles
	 * @return array
	 */
	public function getArticles(){
		$this->db->query('
			SELECT * FROM article
			');
		$this->db->execute();

		$results = $this->db->resultset();
		return $results;
	}

	
}

