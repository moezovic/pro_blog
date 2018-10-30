<?php 

namespace ProBlog\src\Manager;
use ProBlog\src\model\Commentary;


class CommentsManager extends Manager{

	public function getComments($postId){

		$sql = 'SELECT id, content, author, DATE_FORMAT(insert_date, \'%d/%m/%Y à %Hh%imin%ss \') AS insert_date FROM comments WHERE blog_post_id = :id ORDER BY insert_date DESC';
		$result = $this->sql($sql, [':id'=>$postId]);
		$comments = [];
		foreach ($result as $row) 
		{
			$commentId	= $row['id'];
			$comments[$commentId] = $this->hydrate($row);
		}
	
		return $comments;

	}

	public function hydrate(array $row)
	{
		$commentObj = new Commentary();
		foreach ($row as $key => $value) 
		{
			if (preg_match('/_/', $key))
			{
				$explodeString = explode('_', $key);

				foreach ($explodeString as $index => $content) 
				{
					$explodeString[$index] = ucfirst($content);
				}
				$key = implode($explodeString);
			}
			else
			{
				$key = ucfirst($key);
			}

			$method = 'set'.$key;

			if (method_exists($commentObj, $method)) {
				$commentObj->$method($value);
			}
			
		}
		return $commentObj;
	}

}