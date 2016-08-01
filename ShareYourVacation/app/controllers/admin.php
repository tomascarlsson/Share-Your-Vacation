<?php 
/**
 * ========================
 * Login Controller
 * ========================
 */
class Admin extends Controller
{

	/**
	 * Checks it input fields not empty
	 * $name parameter extracted last part of from URL
	 */
	public function index($param = ''){
		/*
		 * Check if session has the user_email set otherwise redirect back  	
		 */
		if( Session::get('user_email') ){
			header('Location:'.  BASE_URI . 'admin/settings');
			exit();	
		}
		else{

			if(!empty($_POST['email']) && !empty($_POST['password'])){

					$user = $this->model('User');
					// On login success
					if( $user->login() ) {					
						Session::set('user_email', $_POST['email'] );
						// Redirect to create_a page
						header('Location:'.  BASE_URI . 'admin/settings');
						exit();			} 
					else{
						$data = ['Wrong e-mail or password. Please try again!'];
						$this->view('admin/login', $data);
					}
			}
			$this->view('admin/login');
		}
				
	}



	/**
	 * Check input values and add articles to database
	 */
	public function settings($name = ''){
		if( Session::get('user_email') ){
			if(isset($_POST['add_article'])){
				if( 
					isset($_POST['title']) && !empty($_POST['title']) &&
					isset($_POST['body']) && !empty($_POST['body']) &&
					isset($_POST['latitude']) && !empty($_POST['latitude']) &&
					isset($_POST['longitude']) && !empty($_POST['longitude'])

				 ){
				 	$article = $this->model('Article');
					$article->addArticle();
					$data = ['New article added!'];
					$this->view('admin/settings', $data);
				}
			}
				
				$this->view('admin/settings');		

		
		}
		else{
			header('Location:'.  BASE_URI . 'admin/index');
			exit();		
		}

	}
	


	public function logout(){
		Session::destroy();
		header('Location:'.  BASE_URI . 'admin/index');
	}


}