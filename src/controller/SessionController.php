<?php 

namespace ProBlog\src\controller;

use ProBlog\src\model\View;
use ProBlog\src\Manager\AdminManager;

Class SessionController
{
	private $adminObj;
	private $viewObj;

	public function __construct()
	{
		$this->viewObj = new View();
		$this->adminObj = new AdminManager();
	}

	public function subscription()
	{
		$this->viewObj->render('subscribe',[]);
	}

	public function connexion()
	{
		$this->viewObj->render('connexion',[]);
	}

	public function addBlogPost()
	{
		$this->viewObj->render('admin/add_blogpost', []);
	}

	public function manageComments()
	{
		$this->viewObj->render('admin/manage_comments', []);
	}

	public function manageBlogPosts()
	{
		$this->viewObj->render('admin/manage_bp', []);
	}

	public function destroySession()
	{
		
		$this->viewObj->render('home', []);
	}

	public function adminAccess()
	{
		$name = htmlspecialchars($_POST['name']);
		$password = htmlspecialchars($_POST['password']);
		$adminsList = $this->adminObj->getAdmin();
		foreach ($adminsList as $admin) 
		{
			$adminName = $admin->getName();
			$adminPass = $admin->getPassword();
			if ($adminName == $name && $password == $adminPass) 
			{
				
				return $this->viewObj->render('home',['session' => $adminName]);
			}
			else
			{
				echo "nothing found";
			}
		}
	}

}