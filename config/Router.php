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

			 	// routes to  the blog posts and comments controller 

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
				 				$this->controllerObj->addBlogPost();
				 			}	
				 			else
				 			{
				 				throw new \Exception();
				 				
				 			}			 			 
				 		}	 
				 		elseif ($_GET['bp'] === 'update') 
				 		{
				 			if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author']) ) 
				 			{
				 				if (isset($_GET['id'])) 
				 				{
				 					$this->controllerObj->updateBlogPost($_GET['id']);
				 				}
				 			}
				 		}
				 		elseif ($_GET['bp'] === 'delete') 
				 		{
				 			if (isset($_GET['id'])) 
				 			{
				 				$this->controllerObj->deleteBlogPost($_GET['id']);
				 			}
				 			else
				 			{
				 				throw new \Exception();
				 				
				 			}	
				 		}
				 		else
				 		{
				 			$this->errorControllerObj->unknown();
				 		}	
			 		}
			 		elseif (isset($_GET['comments'])) 
			 		{
			 			if ($_GET['comments'] === 'new')
			 			{
			 				if (isset($_GET['id'])) 
			 				{
			 					if (!empty($_POST['commentary']) && !empty($_POST['name'] && $_POST['redirection'])) 
			 					{
			 						$this->controllerObj->addPendingComment($_GET['id']);
			 					}
			 					else
				 				{
				 				throw new \Exception();
				 				}	
			 				}
			 				
			 			}
			 			elseif ($_GET['comments'] === 'validate') 
			 			{
			 				if (isset($_GET['id'])) 
			 				{
			 					$this->controllerObj->validateComment($_GET['id']);
			 				}
			 				else
				 			{
				 				throw new \Exception();
				 				
				 			}	
			 			}
			 			elseif ($_GET['comments'] === 'delete') 
			 			{
			 				if (isset($_GET['id'])) 
			 				{
			 					$this->controllerObj->deleteComment($_GET['id']);
			 				}
			 				else
				 			{
				 				throw new \Exception();
				 				
				 			}	
			 			}
			 			else
			 			{
			 				$this->errorControllerObj->unknown();
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
				 		elseif ($_GET['access']=== 'newadmin') 
				 		{
				 			if (!empty($_POST['name']) && !empty($_POST['pswd']) && !empty($_POST['pswd-verify'])) 
				 			{
				 				if ($_POST['pswd'] === $_POST['pswd-verify']) 
				 				{
				 					$this->sessionControllerObj->addNewAdmin();
				 				}	
				 				else
				 				{
				 					throw new \Exception();	
				 				}	
				 			}
				 			else 
				 			{
				 				$this->errorControllerObj->unknown();
				 			}
				 			
				 		}
				 		elseif ($_GET['access'] === 'authentify') 
				 		{
				 			if (!empty($_POST['name']) && !empty($_POST['password'])) 
				 			{
				 				
				 				$this->sessionControllerObj->adminAccess();

				 			}
				 			else
				 			{
				 				$this->errorControllerObj->unknown();
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
						 			elseif ($_GET['admin'] === 'edit') 
						 			{
						 				$this->sessionControllerObj->editBlogPost($_GET['id']);
						 			}
						 			else
						 			{
						 				$this->errorControllerObj->unknown();
						 			}
				 			}
				 			else
				 			{
				 				$this->errorControllerObj->unknown();
				 			}

				 		}
				 		elseif ($_GET['access']=== 'sessionend') 
				 		{
				 			$this->sessionControllerObj->destroySession();
				 		}
				 		else
				 		{
				 			$this->errorControllerObj->unknown();
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