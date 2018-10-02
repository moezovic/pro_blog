<?php 

namespace Problog\src\Manager;

require('Manager.php');

class BlogPostsManager extends Manager{

	public function getBlogPosts(){
		$sql = 'SELECT id, title, topic_sentence, author,DATE_FORMAT(update_time, \' %d/%m/Y à %Hh%imin%ss\') AS last_update FROM blogposts ORDER BY update_time DESC';

		$result = $this->sql($sql);
		return $result
	}

	public function getSinglepost($postId){
		$sql = 'SELECT title, topic_sentence, content, author, DATE_FORMAT(update_time, \'%d/%m/%Y à %Hh/%imin/%ss\') AS last_update FROM blogposts WHERE id = :id ORDER BY update_time DESC';

		$result = $this->sql($sql, [$postId]);
		return $result;

	}

}