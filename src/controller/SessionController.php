<?php

namespace ProBlog\src\controller;

use ProBlog\src\model\View;
use ProBlog\src\Manager\AdminManager;
use ProBlog\src\Manager\BlogPostsManager;
use ProBlog\src\Manager\CommentsManager;

/**
 * The SessionController Class.
 *
 * handles administration authentification and actions.
 */
class SessionController
{
    private $_adminObj;
    private $_viewObj;
    private $_blogPostObj;
    private $_commentDAO;

    public function __construct()
    {
        $this->_viewObj = new View();
        $this->_adminObj = new AdminManager();
        $this->_blogPostObj = new BlogPostsManager();
        $this->_commentDAO = new CommentsManager();
    }

    public function subscription()
    {
        $this->_viewObj->render('subscribe', []);
    }

    public function connexion()
    {
        $this->_viewObj->render('connexion', []);
    }

    public function addNewAdmin()
    {
        $this->_adminObj->insertAdmin();
        $this->_viewObj->render('connexion', []);
    }

    public function addBlogPost()
    {
        $this->_viewObj->render('admin/add_blogpost', []);
    }

    public function manageComments()
    {
        $pendingComments = $this->_commentDAO->getAllPending();
        $this->_viewObj->render('admin/manage_comments', ['pendingComments' => $pendingComments]);
    }

    public function editBlogPost($blogPostId)
    {
        $blogPost = $this->_blogPostObj->getSinglePost($blogPostId);
        $this->_viewObj->render('admin/edit_blogpost', ['blogPost' => $blogPost]);
    }

    public function manageBlogPosts()
    {
        $blogPosts = $this->_blogPostObj->getBlogPosts();
        $this->_viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
    }

    public function destroySession()
    {
        $this->_viewObj->render('home', []);
    }

    public function adminAccess()
    {
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
        $adminsList = $this->_adminObj->getAdmin();
        foreach ($adminsList as $admin) {
            $adminName = $admin->getName();
            $adminPass = $admin->getPassword();
            if ($adminName == $name && password_verify($password, $adminPass)) {
                return $this->_viewObj->render('home', ['session' => $adminName]);
            }
        }
    }
}
