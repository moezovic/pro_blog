<?php

namespace ProBlog\config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('ProBlog', '', $class);

        $class = str_replace('\\', '/', $class);

        include '../'.$class.'.php';
    }
}
