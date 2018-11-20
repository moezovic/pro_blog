<?php 

namespace ProBlog\src\controller;

use ProBlog\src\model\View;

Class SessionController
{

private $viewObj;

public function __construct()
{
	$this->viewObj = new View();
}

public function subscription()
{
	$this->viewObj->render('subscribe',[]);
}

public function authentification()
{
	$this->viewObj->render('connexion',[]);
}

}