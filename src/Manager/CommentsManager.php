<?php

namespace ProBlog\src\Manager;

use ProBlog\src\model\Comments;

/**
 * The CommentsManager class.
 *
 * manage the comments table in the DB.
 */
class CommentsManager extends Manager
{
    public function getComments($postId)
    {
        $sql = 'SELECT id, content, author, DATE_FORMAT(insert_date, \'%d/%m/%Y à %Hh%imin%ss \') AS insert_date FROM comments WHERE blog_post_id = :id ORDER BY insert_date DESC';
        $result = $this->sql($sql, [':id' => $postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->hydrate($row);
        }

        return $comments;
    }

    public function insertComments($comment)
    {
        $sql = 'INSERT INTO comments (blog_post_id, content, author, insert_date) VALUES (:blogpost_id, :content, :author, NOW())';
        $this->sql($sql, [':blogpost_id' => $comment['blogpost_id'], ':content' => $comment['content'], ':author' => $comment['author']]);
    }

    public function insertPending($postId)
    {
        $author = htmlspecialchars($_POST['name']);
        $content = htmlspecialchars($_POST['commentary']);

        if (preg_match('/[a-zA-Z_]{3,}/', $author)) {
             $sql = 'INSERT INTO pending_comments (blogpost_id, author, content, insertion_date) VALUES(:id, :author, :content, NOW())';
             return $this->sql($sql, [':id' => $postId, ':author' => $author, ':content' => $content]);
        }
        throw new \Exception('Le nom de l\'auteur doit contenir au moins 3 caracteres alphabetique');
        
        
    }

    public function getAllPending()
    {
        $sql = 'SELECT id, author, content FROM pending_comments';
        $pendingList = $this->sql($sql);

        return $pendingList;
    }

    public function getSinglePending($id)
    {
        $sql = 'SELECT * FROM pending_comments WHERE id = :id';
        $result = $this->sql($sql, [':id' => $id]);
        $row = $result->fetch();

        return $row;
    }

    public function deleteSinglePending($id)
    {
        $sql = 'DELETE FROM pending_comments WHERE id = :id';
        $this->sql($sql, [':id' => $id]);
    }

    public function deleteVerifiedComment($id)
    {
        $sql = 'DELETE FROM comments WHERE id = :id';
        $this->sql($sql, [':id' => $id]);
    }

    public function deleteListOfComments($id)
    {
        $sql = 'DELETE FROM comments WHERE blog_post_id = :id';
        $this->sql($sql, [':id' => $id]);
    }

    public function hydrate(array $row)
    {
        $commentObj = new Comments();
        foreach ($row as $key => $value) {
            if (preg_match('/_/', $key)) {
                $explodeString = explode('_', $key);

                foreach ($explodeString as $index => $content) {
                    $explodeString[$index] = ucfirst($content);
                }
                $key = implode($explodeString);
            } else {
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
