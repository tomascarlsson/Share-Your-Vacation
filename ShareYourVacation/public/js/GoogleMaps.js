/**
 *  ========================
 *	GOOGLE MAPS CLASS
 *	@requires	Event.js
 *  ========================
 */
var GoogleMaps = {

	//---------------------------------------------------
	//  Public static properties
	//---------------------------------------------------
	
	/**
	 *	Reference to the map.
	 *
	 *	@default null
	 */
	map : null,

	/**
	 * 
	 */
	marker: null,
	
	/**
	 *	The default position (latitude, longitude), if the 
	 *	browser can not use geolocation to detect the user's 
	 *	geographical position
	 */
	DEFAULT_LOCATION_LAT : 20,
	DEFAULT_LOCATION_LNG : 0,


	/**
	 * 
	 */
	ajax: null,


	//---------------------------------------------------
	//  Public static methods
	//---------------------------------------------------
	
	/**
	 *	This static method acts as a class constructor and triggers 
	 *	all the event listeners for this application.
	 *
	 *	@return undefined
	 */
	init : function() 
	{	
		GoogleMaps.initMap();
		//GoogleMaps.initLocation();
		GoogleMaps.getArticles();

		google.maps.event.addListener( GoogleMaps.map, 'click', function(event) { 
			GoogleMaps.placeMarker(event.latLng);
		} );
	},

	

	/**
	 *	Method that creates maps object.
	 *
	 *	@return undefined
	 */
	initMap : function() 
	{	
		var canvas				= document.getElementById('map');
		var options 			= new Object();
			options.zoom		= 2;
			// options.draggable = false;
			options.mapTypeId	= google.maps.MapTypeId.TERRAIN;

		// Instantiation of the map
		GoogleMaps.map = new google.maps.Map(canvas, options);

	},
	


	/**
	 * Method to get the database data using Ajax
	 */
	getArticles: function(){
		GoogleMaps.ajax = new Ajax();
		GoogleMaps.ajax.get( 'http://'+window.location.host + '/studier/API-programmering/Uppgift-4-App/ShareYourVacation/public/api/googlemaps', GoogleMaps.parseArticlesFromDB);
	},

	/**
	 * Parse JSON data to an object
	 * @param JSON data
	 */
	parseArticlesFromDB: function(responseData){
		//console.log(responseData.responseText);
		var articles = JSON.parse(responseData.responseText);
		// console.log(data[0].text);
		GoogleMaps.addMarkersToMap(articles);
	},

	/**
	 * Loops through the articles and instatiates new marker for each object
	 * @param 
	*/
	addMarkersToMap: function(articles){
		for(var i=0; i<articles.length; i++){
			var marker = new GoogleMapsMarker(); 
			marker.createMarker(articles[i]);

		}
		var centerMap = new google.maps.LatLng(GoogleMaps.DEFAULT_LOCATION_LAT, GoogleMaps.DEFAULT_LOCATION_LNG);
		GoogleMaps.map.setCenter(centerMap);
		// //A LatLngBounds instance represents a rectangle in geographical coordinates, including one that crosses the 180 degrees longitudinal meridian.
		// var bounds = GoogleMaps.map.LatLngBounds();
		// var position = new google.maps.LatLng(GoogleMaps.DEFAULT_LOCATION_LAT, GoogleMaps.DEFAULT_LOCATION_LNG);
		// bounds.extend(position);
		// GoogleMaps.map.fitBounds(bounds);
	},

	placeMarker: function(location){
		if(GoogleMaps.marker){ 
                    GoogleMaps.marker.setPosition(location);
        }else{
            GoogleMaps.marker = new google.maps.Marker({
                position: location, 
                map: GoogleMaps.map
            });
        }
       	document.getElementById('latitude').value=location.lat();
        document.getElementById('longitude').value=location.lng();
	}




}

/**
 *	Using Googles event listeners to activate the class.
 */
google.maps.event.addDomListener(window, 'load', GoogleMaps.init); // NOTE THIS NEW EVENT LISTENER FROM GOOGLE