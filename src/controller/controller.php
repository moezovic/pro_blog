<?php 

 namespace App\src\controller;
 use Problog\src\Manager\BlogPostsManager;
 use Problog\src\Manager\CommentsManager;

 class Controller
 {
 	public function blogPosts()
 	{
 		$blogPostObj = new BlogPostsManager();
 		$blogPosts = $blogPostObj->getBlogPosts();
 		require '../templates/blogListView.php';
 	}

 	public function singleBlogPost($idArt)
 	{
 		$blogPostObj = new BlogPostsManager();
 		$blogPost = $blogPostObj->getSinglePost($idArt);
 		$commentObj = new CommentsManager();
 		$commentObj->getComments($idArt)

 		require '../templates/SinglePostView.php';
 	}

 }