<?php 

/**
 * =================
 * API Controller
 * =================
 */
class Api extends Controller{
	
	/**
	 * GOOGLE MAPS FUNCTION
	 * Gets data from article table in database to Google Maps API
	 */
	function googlemaps($param = ''){
		$article = $this->model('Article');

		$data = $article->getArticles();
		echo json_encode($data);

	}


	/**
	 * FLICKR FUNCTION
	 * Gets
	 */
	function flickr($param = ''){

		$flickr = $this->model('Flickr');

		$data = $flickr->photoSearch();
		echo $data;



	}






}