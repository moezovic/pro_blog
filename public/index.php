<?php

require '../config/dev.php';
require '../config/Autoloader.php';

\ProBlog\config\Autoloader::register();

 $router = new \ProBlog\config\Router();
 $router->run();
