<?php

namespace ProBlog\src\controller;

use ProBlog\src\model\View;

/**
 * The HomeController Class.
 *
 * Helps to redirect towards home page.
 */
class HomeController
{
    private $_viewObj;

    public function __construct()
    {
        $this->_viewObj = new View();
    }

    public function toHomePage()
    {
        $this->_viewObj->render('home', []);
    }
}
