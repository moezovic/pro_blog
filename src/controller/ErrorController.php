<?php

namespace ProBlog\src\controller;

use ProBlog\src\model\View;

class ErrorController
{
    private $viewObj;

    public function __construct()
    {
        $this->viewObj = new View();
    }

    public function unknown()
    {
        $this->viewObj->render('unknown', []);
    }

    public function error($e)
    {
        $this->viewObj->render('error', ['e' => $e]);
    }
}
