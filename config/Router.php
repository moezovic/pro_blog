<?php

namespace ProBlog\config;

use ProBlog\src\controller\controller;
use ProBlog\src\controller\ErrorController;
use ProBlog\src\controller\HomeController;
use ProBlog\src\controller\SessionController;

/**
 * The Routing class.
 *
 * Routes towards the 4 controllers.
 */
class Router
{
    private $_controllerObj;
    private $_homeControllerObj;
    private $_errorControllerObj;
    private $_sessionControllerObj;

    public function __construct()
    {
        $this->_controllerObj = new Controller();
        $this->_homeControllerObj = new HomeController();
        $this->_errorControllerObj = new ErrorController();
        $this->_sessionControllerObj = new SessionController();
    }

    public function run()
    {
        try {
            if (isset($_GET['action'])) {
                // routes to  the blog posts and comments controller

                if (isset($_GET['bp'])) {
                    if ('list' === $_GET['bp']) {
                        $this->_controllerObj->blogPosts();
                    } elseif ('single' === $_GET['bp']) {
                        $this->_controllerObj->singleBlogPost($_GET['postId']);
                    } elseif ('new' === $_GET['bp']) {
                        if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author'])) {
                            $this->_controllerObj->addBlogPost();
                        } else {
                            throw new \Exception();
                        }
                    } elseif ('update' === $_GET['bp']) {
                        if (!empty($_POST['title']) && !empty($_POST['topic_sentence']) && !empty($_POST['main_content']) && !empty($_POST['author'])) {
                            if (isset($_GET['id'])) {
                                $this->_controllerObj->updateBlogPost($_GET['id']);
                            }
                        }
                    } elseif ('delete' === $_GET['bp']) {
                        if (isset($_GET['id'])) {
                            $this->_controllerObj->deleteBlogPost($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } else {
                        $this->_errorControllerObj->unknown();
                    }
                } elseif (isset($_GET['comments'])) {
                    if ('new' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            if (!empty($_POST['commentary']) && !empty($_POST['name'] && $_POST['redirection'])) {
                                $this->_controllerObj->addPendingComment($_GET['id']);
                            } else {
                                throw new \Exception();
                            }
                        }
                    } elseif ('validate' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            $this->_controllerObj->validateComment($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } elseif ('delete' === $_GET['comments']) {
                        if (isset($_GET['id'])) {
                            $this->_controllerObj->deleteComment($_GET['id']);
                        } else {
                            throw new \Exception();
                        }
                    } else {
                        $this->_errorControllerObj->unknown();
                    }
                }

                // routes to the the session controller

                elseif (isset($_GET['access'])) {
                    if ('connexion' === $_GET['access']) {
                        $this->_sessionControllerObj->connexion();
                    } elseif ('subscribe' === $_GET['access']) {
                        $this->_sessionControllerObj->subscription();
                    } elseif ('newadmin' === $_GET['access']) {
                        if (!empty($_POST['name']) && !empty($_POST['pswd']) && !empty($_POST['pswd-verify'])) {
                            if ($_POST['pswd'] === $_POST['pswd-verify']) {
                                $this->_sessionControllerObj->addNewAdmin();
                            } else {
                                throw new \Exception();
                            }
                        } else {
                            $this->_errorControllerObj->unknown();
                        }
                    } elseif ('authentify' === $_GET['access']) {
                        if (!empty($_POST['name']) && !empty($_POST['password'])) {
                            $this->_sessionControllerObj->adminAccess();
                        } else {
                            $this->_errorControllerObj->unknown();
                        }
                    } elseif ('connected' === $_GET['access']) {
                        if (isset($_GET['admin'])) {
                            if ('add_blogpost' === $_GET['admin']) {
                                $this->_sessionControllerObj->addBlogPost();
                            } elseif ('manage_blogposts' === $_GET['admin']) {
                                $this->_sessionControllerObj->manageBlogPosts();
                            } elseif ('manage_comments' === $_GET['admin']) {
                                $this->_sessionControllerObj->manageComments();
                            } elseif ('edit' === $_GET['admin']) {
                                $this->_sessionControllerObj->editBlogPost($_GET['id']);
                            } else {
                                $this->_errorControllerObj->unknown();
                            }
                        } else {
                            $this->_errorControllerObj->unknown();
                        }
                    } elseif ('sessionend' === $_GET['access']) {
                        $this->_sessionControllerObj->destroySession();
                    } else {
                        $this->_errorControllerObj->unknown();
                    }
                } else {
                    $this->_errorControllerObj->unknown();
                }
            }
            // routes to the home page controller
            else {
                $this->_homeControllerObj->toHomePage();
            }
        } catch (\Exception $e) {
            // echo $e->getMessage();
            $this->_errorControllerObj->error($e);
        }
    }
}
