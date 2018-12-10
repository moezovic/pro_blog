<?php

namespace ProBlog\src\model;

class BlogPost
{
    private $id;
    private $title;
    private $topic_sentence;
    private $content;
    private $author;
    private $update_time;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTopicSentence()
    {
        return $this->topic_sentence;
    }

    public function setTopicSentence($sentence)
    {
        $this->topic_sentence = $sentence;
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

    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function setUpdateTime($time)
    {
        $this->update_time = $time;
    }
}
