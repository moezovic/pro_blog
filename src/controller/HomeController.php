<?php 

namespace ProBlog\src\controller;

use ProBlog\src\model\View;

class HomeController
{

    private $viewObj;

    public function __construct()
    {
        $this->viewObj = new View();
    }

    public function toHomePage()
    {
        $this->viewObj->render('home', []);
    }

}