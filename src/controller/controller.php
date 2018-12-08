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
        $this->viewObj = new View();
         
    }


    public function blogPosts()
    {
        $blogPosts = $this->blogPostDAO->getBlogPosts();
        $this->viewObj->render(
            'blogListView', [
            'blogPosts' => $blogPosts
            ]
        );
    }

    public function singleBlogPost($postId)
    {
         
        $blogPost = $this->blogPostDAO->getSinglePost($postId);
         
        $comments = $this->commentDAO->getComments($postId);
        $this->viewObj->render(
            'singlePostView', [
            'blogPost' => $blogPost,
            'comments' => $comments,
            ]
        );
    }

    public function addBlogPost()
    {
        $this->blogPostDAO->insertBlogPost();
        $blogPosts = $this->blogPostDAO->getBlogPosts();
        $this->viewObj->render('blogListView', ['blogPosts' => $blogPosts]);
    }

    public function updateBlogPost($id)
    {
        $this->blogPostDAO->updateBlogPost($id);
        $blogPosts = $this->blogPostDAO->getBlogPosts();
        $this->viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
    }

    public function deleteBlogPost($id)
    {
        $this->blogPostDAO->deleteBlogPost($id);
        $blogPosts = $this->blogPostDAO->getBlogPosts();
        $this->viewObj->render('admin/manage_bp', ['blogPosts' => $blogPosts]);
    }

    public function addPendingComment($id)
    {
        $blogPostId = htmlspecialchars($_POST['redirection']);
        $this->commentDAO->insertPending($id);
        $blogPost = $this->blogPostDAO->getSinglePost($blogPostId);
        $comments = $this->commentDAO->getComments($blogPostId);
        $this->viewObj->render('singlePostView', ['blogPost' => $blogPost, 'comments' => $comments]);
    }

    public function validateComment($id)
    {
        $array = $this->commentDAO->getSinglePending($id);
        $this->commentDAO->deleteSinglePending($id);
        $this->commentDAO->insertComments($array);
        $pendingComments = $this->commentDAO->getAllPending();
        $this->viewObj->render('admin/manage_comments', ['pendingComments' => $pendingComments]);
    }

    public function deleteComment($id)
    {
        $this->commentDAO->deleteSinglePending($id);
        $pendingComments = $this->commentDAO->getAllPending();
        $this->viewObj->render('admin/manage_comments', ['pendingComments' => $pendingComments]);
    }

}




