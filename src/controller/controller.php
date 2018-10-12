<?php 

 namespace ProBlog\src\controller;

 use Problog\src\Manager\BlogPostsManager;
 use Problog\src\Manager\CommentsManager;

 class Controller
 {

 	private $blogPostDAO;
 	private $commentDAO;


 	public function __construct()
 	{

 		$this->blogPostDAO = new BlogPostsManager();
 		$this->commentDAO = new CommentsManager();

 	}


 	public function blogPosts()
 	{
 		
 		$blogPosts = $this->blogPostDAO->getBlogPosts();
 		require '../templates/blogListView.php';
 	}

 	public function singleBlogPost($postId)
 	{
 		
 		$blogPost = $this->blogPostDAO->getSinglePost($postId);
 		
 		$comments = $this->commentDAO->getComments($postId)

 		require '../templates/SinglePostView.php';
 	}

 }