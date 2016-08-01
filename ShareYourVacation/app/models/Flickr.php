<?php

/**
 * ========================================
 * The Flickr Class
 * - handles flickr calls and responses 
 * ========================================
 */
class Flickr
{

	//---------------------------------------------------
	//  Public methods
	//---------------------------------------------------
	
	/**
	 *	Performs an image search with the Flickr API. The 
	 *	method returns the search results as a JSON object. 
	 *	If an error occurred, the method will return null 
	 *	as a result.
	 *
	 *	@return	JSON	The response from Flikr API as JSON.
	 */
	public function photoSearch()
	{

		
		$lat = $_GET['lat'];
		$lng = $_GET['lng'];

		$arrContextOptions=array(
			    "ssl"=>array(
			    	"verify_peer"=>false,"verify_peer_name"=>false),
		); 

		$string	 = 'https://api.flickr.com/services/rest/?method=';
		$string	.= 'flickr.photos.search';
		$string	.= '&api_key=6c1d87b9083cd42feec62403294bed43';
		$string .= '&per_page=25';
		$string .= '&page=1';
		$string .= '&content_type=1';
		$string .= '&has_geo=1';
		$string .= '&lat='.$lat;
		$string .= '&lon='.$lng;
		$string .= '&radius=2';
		$string .= '&radius_units=km';
		$string	.= '&format=json';
		$content = @file_get_contents("$string", false, stream_context_create($arrContextOptions));
		$content = @str_replace('jsonFlickrApi(', '', $content); // VALIDATE JSON

		$content = @substr($content, 0, strlen($content) - 1 );
		
		return $content;
	}
}

?>