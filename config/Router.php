<?php 

 namespace App\config;

 class Router
 {
 	public function run()
 	{
 		if(isset($_GET['action']))
		 {
		 		if ($_GET['route'] === 'list') 
		 		{
		 			require '../templates/blogListView.php';
		 		}

		 		elseif ($_GET['route'] === 'single') 
		 		{
		 			require '../templates/singlePostView.php';
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