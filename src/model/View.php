<?php

namespace ProBlog\src\model;

use Exception;

/**
 * The View Class.
 *
 * Used to manage all the templates.
 */
class View
{
    private $_file;
    private $_title;
    private $_menu;
    private $_custom;

    public function render($template, $data = [])
    {
        $this->_file = '../templates/'.$template.'.php';
        $content = $this->renderFile($this->_file, $data);
        $view = $this->renderFile(
            '../templates/base.php', [
            'title' => $this->_title,
            'content' => $content,
            'menu' => $this->_menu,
            'custom' => $this->_custom,
            ]
        );
        echo $view;
    }

    public function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            include $file;

            return ob_get_clean();
        } else {
            throw new Exception('Le template est introuvable');
        }
    }
}
