<?php 

 namespace App\config;
 use App\src\controller\Controller;

 class Router
 {

 	private $controller;

 	public function __construct()
 	{
 		$this->controller = new Controller();
 	}


 	public function run()
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
		 			echo 'Page inconnu';
		 		}
		 }
		 else
		 {
		 		require '../templates/home.php';
		 }
 	}
 }