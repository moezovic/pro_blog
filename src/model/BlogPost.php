<?php

namespace ProBlog\src\model;

/**
 * The BlogPost class.
 *
 * Used by the hydration function.
 *
 * Creates BlogPost object
 */
class BlogPost
{
    private $_id;
    private $_title;
    private $_topic_sentence;
    private $_content;
    private $_author;
    private $_update_time;

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getTopicSentence()
    {
        return $this->_topic_sentence;
    }

    public function setTopicSentence($sentence)
    {
        $this->_topic_sentence = $sentence;
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

    public function getUpdateTime()
    {
        return $this->_update_time;
    }

    public function setUpdateTime($time)
    {
        $this->_update_time = $time;
    }
}
