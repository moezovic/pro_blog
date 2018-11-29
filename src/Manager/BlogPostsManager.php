<?php 

namespace ProBlog\src\Manager;
use ProBlog\src\model\BlogPost;

class BlogPostsManager extends Manager
{


	public function getBlogPosts()
	{
		$sql = 'SELECT id, title, topic_sentence, author, DATE_FORMAT(update_time, \'%d/%m/%Y à %Hh%imin%ss\') AS update_time FROM blogposts ORDER BY update_time DESC';

		$result = $this->sql($sql);
		$articles = [];
		foreach ($result as $row) {
			$articleId = $row['id'];
			$articles[$articleId] = $this->hydrate($row);
		}
	
		return $articles;
	}

	public function getSinglePost($postId)
	{
		$sql = 'SELECT id, title, topic_sentence, content, author, DATE_FORMAT(update_time, \'%d/%m/%Y à %Hh/%imin/%ss\') AS update_time FROM blogposts WHERE id = :id ORDER BY update_time DESC';
		$result = $this->sql($sql, [':id'=>$postId]);
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

	public function insertBlogPost($title, $topicSentence, $content, $author)
	{
		$sql = 'INSERT INTO blogposts (title, topic_sentence, content, author, update_time) VALUES (:title, :topic_sentence, :content, :author, NOW())';
		$result = $this->sql($sql, [':title'=>$title, ':topic_sentence'=>$topicSentence, ':content'=>$content, ':author'=>$author]);
	}

	private function hydrate(array $row)
	{
		$articleObj = new BlogPost();
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



