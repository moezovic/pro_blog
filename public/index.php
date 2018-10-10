<?php 
require '../config/Autoloader.php';
require '../config/dev.php';

\ProBlog\config\Autoloader::register();
 
 $router = new \ProBlog\config\Router();
 $router->run();