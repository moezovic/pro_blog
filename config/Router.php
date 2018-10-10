<?php 

 namespace App\config;
 use App\src\controller\Controller;
 use App\src\controller\ErrorController;

 class Router
 {

 	private $controller;
 	private $errorController;

 	public function __construct()
 	{
 		$this->controller = new Controller();
 		$this->errorController = new ErrorController();
 	}


 	public function run()
 	{
 		try
 		{
	 		 if(isset($_GET['action']))
			 {
			 		if ($_GET['action'] === 'list') 
			 		{
			 		
			 			$this->controller->blogPosts();

			 		}

			 		elseif ($_GET['action'] === 'single') 
			 		{
			 			
			 			$this->controller->singleBlogPost($_GET['postId']);

			 		}
			 		else
			 		{
			 			$this->errorController->unknown();
			 		}
			 }
			 else
			 {
			 		require '../templates/home.php';
			 }
 		}
 		catch(Exception $e)
 		{
 			$this->errorController->error();
 		}

 	}
 }