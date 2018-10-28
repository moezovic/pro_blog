<?php 

 namespace ProBlog\src\controller;

 use ProBlog\src\Manager\BlogPostsManager;
 use ProBlog\src\Manager\CommentsManager;
 use ProBlog\src\model\View;

 class Controller
 {

 	private $blogPostDAO;
 	private $commentDAO;
 	private $viewObj;


 	public function __construct()
 	{

 		$this->blogPostDAO = new BlogPostsManager();
 		$this->commentDAO = new CommentsManager();
 		$this->view = new View();

 	}


 	public function blogPosts()
 	{
 		
 		$blogPosts = $this->blogPostDAO->getBlogPosts();
 		$this->view->render('blogListView',[
 			'blogPosts' => $blogPosts
 		]);
 	}

 	public function singleBlogPost($postId)
 	{
 		
 		$blogPost = $this->blogPostDAO->getSinglePost($postId);
 		
 		$comments = $this->commentDAO->getComments($postId);
 		$this->view->render('singlePostView', [
 			'blogPost' => $blogPost,
 			'comments' => $comments
 		]);
 	}

 }