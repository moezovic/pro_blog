<?php

namespace ProBlog\src\controller;

use ProBlog\src\model\View;

/**
 * the ErrolController Class.
 *
 * Helps redirect the user when error occurs.
 */
class ErrorController
{
    private $_viewObj;

    public function __construct()
    {
        $this->_viewObj = new View();
    }

    public function unknown()
    {
        $this->_viewObj->render('unknown', []);
    }

    public function error($e)
    {
        $this->_viewObj->render('error', ['e' => $e]);
    }
}
