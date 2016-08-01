/**
 *  ========================
 *	GOOGLE MAPS MARKER CLASS
 *  ========================
 */
 function GoogleMapsMarker(){
	/**
	 *	Internal reference to the instance of this object. 
	 */
	var self = this;


 	/**
 	 * Properties of the Marker Class
 	 */
 	this.title = '';
 	this.message = '';
 	this.location_lat = null;
 	this.location_lng = null;
 	this.marker = null;

 	this.infoWindow = null;

 	this.position = null;

 	this.ajax = null;

	
	/**
	 * Constructor function of a marker on the map
	 */
	/**
	 * Creates a marker object
	 * google.maps.MarkerOptions object specification
	 */
	this.createMarker = function(article){	
		saveArticleData(article);
		//console.log(article);


		var options				= new Object();
			options.map			= GoogleMaps.map;
			options.draggable	= false;
			options.animation	= google.maps.Animation.DROP;
			options.position	= self.position;
			options.title		= self.title;
			
		self.marker = new google.maps.Marker(options);
		
		// NOTERA GOOGLES EGNA HÄNDELSEHANTERARE
		google.maps.event.addListener(self.marker, 'mousedown', toggleInfoWindow);
	}

	function saveArticleData(article){
		self.title = article.title;
	 	self.message = article.body;
	 	self.location_lat = article.lat;
	 	self.location_lng = article.lng;
	 	self.position = new google.maps.LatLng(article.lat, article.lng);
	}


	/**
	 * Toggle the info window at the marker
	 * Method to toggle (show/hide) the information window 
	 *	on the map.
	 */
	function toggleInfoWindow(event){		
		if (!self.infowindow)
			// console.log(event.latLng);
			// console.log(self.message);
			 initInformationWindow(event.latLng, self.message);
			 
		if (self.infowindow.getMap())
			self.infowindow.close();
		else
			self.infowindow.open(GoogleMaps.map, self.marker);
		// Show flicker api images
		//alert('http://'+window.location.host + '/studier/API-programmering/Uppgift-4-App/ShareYourVacation/public/api/flickr?lat='+self.location_lat+'&lng='+self.location_lng);
		GoogleMaps.ajax = new Ajax();
		GoogleMaps.ajax.get( 'http://'+window.location.host + '/studier/API-programmering/Uppgift-4-App/ShareYourVacation/public/api/flickr?lat='+self.location_lat+'&lng='+self.location_lng , parseFlickrImages);

	}

	/**
	 * Parse JSON data to an object
	 * @param JSON data
	 */
	function parseFlickrImages(responseData){
		//console.log(responseData);
		var images = JSON.parse(responseData.responseText);
		renderImages(images);
	}

	/**
	 * Show the Flickr images on the page
	 */
	function renderImages(images){
		var output = '';
		//console.log(images);
		var allPhotos = images.photos.photo;
		for (var key in allPhotos) {
		  if (allPhotos.hasOwnProperty(key)) {
		    //console.log(key + " -> " + allPhotos[key].id);
		    output += '<li><img src="http://farm'+allPhotos[key].farm+'.staticflickr.com/'+allPhotos[key].server+'/'+allPhotos[key].id+'_'+allPhotos[key].secret+'_q.jpg" /></li>';
		 	console.log(allPhotos[key].id);
		  }

		}
		document.getElementById("flickr_images").innerHTML = output;

	}




	/**
	 * Initiation the information window
	 * 	@param	position	An position-objects from the google maps API.
	 *	@param	content		The content of the information window in the form of a text string.
	 *
	 */
	function initInformationWindow(position, content){		
		var options			= new Object();
		options.content		= content;

		self.infowindow = new google.maps.InfoWindow(options);
	}




}