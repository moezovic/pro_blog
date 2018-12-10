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
        try {
            if (isset($_GET['action'])) {
                // routes to  the blog posts and comments controller

                if (isset($_GET['bp'])) {
                    if ('list' === $_GET['bp']) {
                        $this->controllerObj->blogPosts();
                    } elseif ('single' === $_GET['bp']) {
                        $this->controllerObj->singleBlogPost($_GET['postId']);
                    } elseif ('new' === $_GET['bp']) {
                        if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author'])) {
                            $this->controllerObj->addBlogPost();
                        } else {
                            throw new \Exception();
                        }
                    } elseif ('update' === $_GET['bp']) {
                        if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author'])) {
                            if (isset($_GET['id'])) {
                                $this->controllerObj->updateBlogPost($_GET['id']);
                            }
                        }
                    } elseif ('delete' === $_GET['bp']) {
                        if (isset($_GET['id'])) {
                            $this->controllerObj->deleteBlogPost($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } else {
                        $this->errorControllerObj->unknown();
                    }
                } elseif (isset($_GET['comments'])) {
                    if ('new' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            if (!empty($_POST['commentary']) && !empty($_POST['name'] && $_POST['redirection'])) {
                                $this->controllerObj->addPendingComment($_GET['id']);
                            } else {
                                throw new \Exception();
                            }
                        }
                    } elseif ('validate' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            $this->controllerObj->validateComment($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } elseif ('delete' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            $this->controllerObj->deleteComment($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } else {
                        $this->errorControllerObj->unknown();
                    }
                }

                // routes to the the session controller

                elseif (isset($_GET['access'])) {
                    if ('connexion' === $_GET['access']) {
                        $this->sessionControllerObj->connexion();
                    } elseif ('subscribe' === $_GET['access']) {
                        $this->sessionControllerObj->subscription();
                    } elseif ('newadmin' === $_GET['access']) {
                        if (!empty($_POST['name']) && !empty($_POST['pswd']) && !empty($_POST['pswd-verify'])) {
                            if ($_POST['pswd'] === $_POST['pswd-verify']) {
                                $this->sessionControllerObj->addNewAdmin();
                            } else {
                                throw new \Exception();
                            }
                        } else {
                            $this->errorControllerObj->unknown();
                        }
                    } elseif ('authentify' === $_GET['access']) {
                        if (!empty($_POST['name']) && !empty($_POST['password'])) {
                            $this->sessionControllerObj->adminAccess();
                        } else {
                            $this->errorControllerObj->unknown();
                        }
                    } elseif ('connected' === $_GET['access']) {
                        if (isset($_GET['admin'])) {
                            if ('add_blogpost' === $_GET['admin']) {
                                $this->sessionControllerObj->addBlogPost();
                            } elseif ('manage_blogposts' === $_GET['admin']) {
                                $this->sessionControllerObj->manageBlogPosts();
                            } elseif ('manage_comments' === $_GET['admin']) {
                                $this->sessionControllerObj->manageComments();
                            } elseif ('edit' === $_GET['admin']) {
                                $this->sessionControllerObj->editBlogPost($_GET['id']);
                            } else {
                                $this->errorControllerObj->unknown();
                            }
                        } else {
                            $this->errorControllerObj->unknown();
                        }
                    } elseif ('sessionend' === $_GET['access']) {
                        $this->sessionControllerObj->destroySession();
                    } else {
                        $this->errorControllerObj->unknown();
                    }
                } else {
                    $this->errorControllerObj->unknown();
                }
            }
            // routes to the home page controller
            else {
                $this->homeControllerObj->toHomePage();
            }
        } catch (\Exception $e) {
            // echo $e->getMessage();
            $this->errorControllerObj->error($e);
        }
    }
}
