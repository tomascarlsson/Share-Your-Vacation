<?php 
//Session::display(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

		
		<title>Share Your Vacation Story</title>

		 <!-- Custom CSS for this template -->
	 <link href="<?php echo BASE_URI; ?>/css/shareyourvacation.css" rel="stylesheet">

	 <!-- Javascripts -->
	  <script type="text/javascript" language="javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&v=3"></script>
    <script src="<?php echo BASE_URI; ?>/js/events/Event.js"> </script> 
    <script src="<?php echo BASE_URI; ?>/js/net/Ajax.js"> </script> 
    <script  src="<?php echo BASE_URI; ?>/js/GoogleMapsMarker.js"> </script>  
    <script  src="<?php echo BASE_URI; ?>/js/GoogleMaps.js"> </script>  
    <script  src="<?php echo BASE_URI; ?>/js/Main.js"> </script>  

	</head>

<body>
<div id="container">
<div id="header"></div>
  <div id="content">

    <header>
      <div class="row"></div>
      <div class="row"><?php
        include('navigation.php'); 
       ?></div>    
    </header><!-- /.row -->
      <div class="line">&nbsp;</div>
