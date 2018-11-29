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

			 	// routes to  the blog posts controller

			 		if(isset($_GET['bp']))
			 		{
				 		if ($_GET['bp'] === 'list') 
				 		{
				 		
				 			$this->controllerObj->blogPosts();

				 		}

				 		elseif ($_GET['bp'] === 'single') 
				 		{
				 			
				 			$this->controllerObj->singleBlogPost($_GET['postId']);

				 		}
				 		elseif ($_GET['bp'] === 'new') 
				 		{
				 			if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author']) ) 
				 			{
				 				$this->controllerObj->newBlogPost();
				 			}
				 			 
				 		}	 			
			 		}

			 		// routes to the the session controller

			 		elseif (isset($_GET['access'])) 
			 		{
				 		if ($_GET['access'] === 'connexion') 
				 		{
				 			
				 			$this->sessionControllerObj->connexion();

				 		}
				 		elseif ($_GET['access'] === 'subscribe') 
				 		{
				 			
				 			$this->sessionControllerObj->subscription();

				 		}
				 		elseif ($_GET['access'] === 'authentify') 
				 		{
				 			if (!empty($_POST['name']) && !empty($_POST['password'])) 
				 			{
				 				
				 				$this->sessionControllerObj->adminAccess();

				 			}
				 			else
				 			{
				 				echo "veuillez renseignez tous les champs";
				 			}
				 		}
				 		elseif ($_GET['access'] === 'connected') 
				 		{
				 			if (isset($_GET['admin'])) 
				 			{
				 					if ($_GET['admin'] === 'add_blogpost') 
						 			{
						 				$this->sessionControllerObj->addBlogPost();
						 			}
						 			elseif ($_GET['admin'] === 'manage_blogposts') 
						 			{
						 				$this->sessionControllerObj->manageBlogPosts();
						 			}
						 			elseif ($_GET['admin'] === 'manage_comments') 
						 			{
						 				$this->sessionControllerObj->manageComments();
						 			}
						 			else
						 			{
						 				echo "unauthorized action";
						 			}
				 			}
				 			else
				 			{
				 				echo "missing admin param";
				 			}

				 		}
				 		elseif ($_GET['access']=== 'sessionend') 
				 		{
				 			$this->sessionControllerObj->destroySession();
				 		}

			 		}
			 		else
			 		{
			 			$this->errorControllerObj->unknown();
			 		}
			 }
			 // routes to the home page controller
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