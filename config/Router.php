<?php 

 namespace App\config;
 use App\src\controller\Controller;

 class Router
 {
 	public function run()
 	{
 		if(isset($_GET['action']))
		 {
		 		if ($_GET['route'] === 'list') 
		 		{
		 			$controller = new controller();
		 			$controller ->SingleBlogPost($_GET['idArt']);

		 		}

		 		elseif ($_GET['route'] === 'single') 
		 		{
		 			$controller = new Controller();
		 			$controller->blogPosts();
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