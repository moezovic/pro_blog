<?php

namespace ProBlog\src\model;

class Comments
{
    private $id;
    private $blog_post_id;
    private $content;
    private $author;
    private $insert_date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBlogPostId()
    {
        return $this->blog_post_id;
    }

    public function setBlogPostId($postId)
    {
        $this->blog_post_id = $postId;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getInsertDate()
    {
        return $this->insert_date;
    }

    public function setInsertDate($time)
    {
        $this->insert_date = $time;
    }
}
