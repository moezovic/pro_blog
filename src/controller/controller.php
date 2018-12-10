<?php

namespace ProBlog\src\controller;

use ProBlog\src\Manager\BlogPostsManager;
use ProBlog\src\Manager\CommentsManager;
use ProBlog\src\model\View;

/**
 * The Controller Class.
 *
 * Deals with the BlogPostManager, the CommentManger.
 */
class Controller
{
    private $_blogPostDAO;
    private $_commentDAO;
    private $_viewObj;

    public function __construct()
    {
        $this->_blogPostDAO = new BlogPostsManager();
        $this->_commentDAO = new CommentsManager();
        $this->_viewObj = new View();
    }

    public function blogPosts()
    {
        $blogPosts = $this->_blogPostDAO->getBlogPosts();
        $this->_viewObj->render(
            'blogListView', [
            'blogPosts' => $blogPosts,
            ]
        );
    }

    public function singleBlogPost($postId)
    {
        $blogPost = $this->_blogPostDAO->getSinglePost($postId);

        $comments = $this->_commentDAO->getComments($postId);
        $this->_viewObj->render(
            'singlePostView', [
            'blogPost' => $blogPost,
            'comments' => $comments,
            ]
        );
    }

    public function addBlogPost()
    {
        $this->_blogPostDAO->insertBlogPost();
        $blogPosts = $this->_blogPostDAO->getBlogPosts();
        $this->_viewObj->render('blogListView', ['blogPosts' => $blogPosts]);
    }

    public function updateBlogPost($id)
    {
        $this->_blogPostDAO->updateBlogPost($id);
        $blogPosts = $this->_blogPostDAO->getBlogPosts();
        $this->_viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
    }

    public function deleteBlogPost($id)
    {
        $this->_blogPostDAO->deleteBlogPost($id);
        $blogPosts = $this->_blogPostDAO->getBlogPosts();
        $this->_viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
    }

    public function addPendingComment($id)
    {
        $blogPostId = htmlspecialchars($_POST['redirection']);
        $this->_commentDAO->insertPending($id);
        $blogPost = $this->_blogPostDAO->getSinglePost($blogPostId);
        $comments = $this->_commentDAO->getComments($blogPostId);
        $this->_viewObj->render('singlePostView', ['blogPost' => $blogPost, 'comments' => $comments]);
    }

    public function validateComment($id)
    {
        $array = $this->_commentDAO->getSinglePending($id);
        $this->_commentDAO->deleteSinglePending($id);
        $this->_commentDAO->insertComments($array);
        $pendingComments = $this->_commentDAO->getAllPending();
        $this->_viewObj->render('admin/manage_comments', ['pendingComments' => $pendingComments]);
    }

    public function deleteComment($id)
    {
        $this->_commentDAO->deleteSinglePending($id);
        $pendingComments = $this->_commentDAO->getAllPending();
        $this->_viewObj->render('admin/manage_comments', ['pendingComments' => $pendingComments]);
    }
}
