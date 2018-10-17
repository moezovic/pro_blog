<?php 

namespace Problog\src\Manager;


class CommentsManager extends Manager{

	public function getComments($postId){

		$sql = 'SELECT content, author, DATE_FORMAT(insert_date, \'%d/%m/%Y à %Hh%imin%ss \') AS insertion_date FROM comments WHERE blog_post_id = :id ORDER BY DESC';
		$result = $this->sql($sql, [$postId]);
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
		return $commentObj
	}

}