<?php 

/**
 * =================
 * Home Controller
 * =================
 */
class Home extends Controller{
	
	function index($param = ''){

		// Calling a View
		$this->view('home/index');

	}


}