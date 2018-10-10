<?php 

namespace Problog\src\Manager;


class CommentsManager extends Manager{

	public function getComments($postId){

		$sql = 'SELECT content, author, DATE_FORMAT(insert_date, \'%d/%m/%Y à %Hh%imin%ss \') AS insertion_date FROM comments WHERE blog_post_id = :id ORDER BY DESC';
		$result = $this->sql($sql, [$postId]);
		return $result;

	}

}