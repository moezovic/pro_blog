<?php

namespace ProBlog\src\model;

/**
 * The Comments class.
 *
 * Used by the hydration function.
 *
 * Creates Comments object
 */
class Comments
{
    private $_id;
    private $_blog_post_id;
    private $_content;
    private $_author;
    private $_insert_date;

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getBlogPostId()
    {
        return $this->_blog_post_id;
    }

    public function setBlogPostId($postId)
    {
        $this->_blog_post_id = $postId;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function getInsertDate()
    {
        return $this->_insert_date;
    }

    public function setInsertDate($time)
    {
        $this->_insert_date = $time;
    }
}
