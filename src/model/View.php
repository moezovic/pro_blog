<?php 
namespace ProBlog\src\model;
use Exception;

class View
{
	private $file;
	private $title;

	public function render($template, $data = [])
	{
		$this->file = '../templates/'.$template.'.php';
		$content = $this->renderFile($this->file, $data);
		$view = $this->renderFile('../templates/base.php',[
			'title' => $this->title,
			'content' => $content
		]);
		echo $view;


	}

	public function renderFile($file, $data)
	{
		if(file_exists($file))
		{
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();
		}
		else
		{
			throw new Exception('Le template est introuvable');
			  
		}
	}
}

 ?>