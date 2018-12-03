<?php 

namespace ProBlog\src\controller;

use ProBlog\src\model\View;
use ProBlog\src\Manager\AdminManager;
use ProBlog\src\Manager\BlogPostsManager;
use ProBlog\src\Manager\CommentsManager;

Class SessionController
{
	private $adminObj;
	private $viewObj;
	private $blogPostObj;
	private $commentDAO;

	public function __construct()
	{
		$this->viewObj = new View();
		$this->adminObj = new AdminManager();
		$this->blogPostObj = new BlogPostsManager();
		$this->commentDAO = new CommentsManager;
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
		$pendingComments = $this->commentDAO->getAllPending();
 		$this->viewObj->render('admin/manage_comments', ['pendingComments'=>$pendingComments]);
	}

	public function editBlogPost($blogPostId)
	{
		$blogPost = $this->blogPostObj->getSinglePost($blogPostId);
		$this->viewObj->render('admin/edit_blogpost', ['blogPost' => $blogPost]);
	}

	public function manageBlogPosts()
	{
		$blogPosts = $this->blogPostObj->getBlogPosts();
		$this->viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
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