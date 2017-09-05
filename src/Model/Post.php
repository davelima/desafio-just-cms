<?php

namespace Model;

class Post
{
    /**
     * Post title
     *
     * @var string
     */
    public $title;

    /**
     * Post body
     *
     * @var string
     */
    public $body;

    /**
     * Post slug (path)
     *
     * @var string
     */
    public $slug;

    /**
     * Post ID
     *
     * @var integer
     */
    public $id;

    /**
     * Sets post title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
       $this->title = $title;
       return $this;
    }

    /**
     * Gets post title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets post body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Gets post body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets post slug
     *
     * @param $slug
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Gets post slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets post ID
     *
     * @param $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets post ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
