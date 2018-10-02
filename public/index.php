<?php 
require '../config/Autoloader.php';
\ProBlog\config\Autoloader::register();
 
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