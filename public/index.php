<?php

require '../config/dev2.php';
require '../config/Autoloader.php';

\ProBlog\config\Autoloader::register();

 $router = new \ProBlog\config\Router();
 $router->run();
