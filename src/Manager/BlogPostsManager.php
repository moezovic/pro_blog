<?php 

namespace Problog\src\Manager;
use ProBlog\src\model\Article();

class BlogPostsManager extends Manager
{

	public function getBlogPosts()
	{
		$sql = 'SELECT id, title, topic_sentence, author, DATE_FORMAT(update_time, \'%d/%m/Y à %Hh%imin%ss\') AS last_update FROM blogposts ORDER BY update_time DESC';

		$result = $this->sql($sql);
		$articles = [];
		foreach ($result as $row) {
			$articleId = $row['id'];
			$articles[$articleId] = $this->hydrate($row)
		}
		return $articles;
	}

	public function getSinglePost($postId)
	{
		$sql = 'SELECT id, title, topic_sentence, content, author, DATE_FORMAT(update_time, \'%d/%m/%Y à %Hh/%imin/%ss\') AS last_update FROM blogposts WHERE id = :id ORDER BY update_time DESC';

		$result = $this->sql($sql, [$postId]);
		$row = $result->fetch();
		if ($row) 
		{
			return $this->hydrate($row);
		}
		else
		{
			echo 'Aucun article existant avec identifiant';
		}

	}

	private function hydrate(array $row)
	{
		$articleObj = new Article();
		foreach ($row as $key => $value) 
		{
			if (preg_match('/_/', $key))
			{
				$explodString = explode('_', $key);

				foreach ($explodString as $index => $content) {
					$explodString[$index] = ucfirst($content);
				}
				$key = implode($explodString);
			}
			else
			{
				$key = ucfirst($key);
			}

			$method = 'set'.$key;
			if(method_exists($articleObj, $method))
			{
				$articleObj->$method($value);
			}
		}
		return $articleObj;
	}

}



