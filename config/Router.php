<?php 

 namespace ProBlog\config;
 use ProBlog\src\controller\controller;
 use ProBlog\src\controller\ErrorController;
 use ProBlog\src\controller\HomeController;
 use ProBlog\src\controller\SessionController;

 class Router
 {

 	private $controllerObj;
 	private $homeControllerObj;
 	private $errorControllerObj;
 	private $sessionControllerObj;

 	public function __construct()
 	{
 		$this->controllerObj = new Controller();
 		$this->homeControllerObj = new HomeController();
 		$this->errorControllerObj = new ErrorController();
 		$this->sessionControllerObj = new SessionController();
 	}


 	public function run()
 	{
 		try
 		{
	 		 if(isset($_GET['action']))
			 {
			 		if ($_GET['action'] === 'list') 
			 		{
			 		
			 			$this->controllerObj->blogPosts();

			 		}

			 		elseif ($_GET['action'] === 'single') 
			 		{
			 			
			 			$this->controllerObj->singleBlogPost($_GET['postId']);

			 		}
			 		elseif ($_GET['action'] === 'connexion') 
			 		{
			 			
			 			$this->sessionControllerObj->authentification();

			 		}
			 		elseif ($_GET['action'] === 'subscribe') 
			 		{
			 			
			 			$this->sessionControllerObj->subscription();

			 		}
			 		else
			 		{
			 			$this->errorControllerObj->unknown();
			 		}
			 }
			 else
			 {
			 		
			 		$this->homeControllerObj->toHomePage();
			 }
 		}
 		catch(\Exception $e)
 		{
 			// echo $e->getMessage();
 			$this->errorControllerObj->error($e);
 		}

 	}
 }