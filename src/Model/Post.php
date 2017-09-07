<?php

namespace Model;

use Library\Database;
use Library\Model;

class Post extends Model
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
     * Database instance
     *
     * @var Database
     */
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

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

    /**
     * Return all registered posts
     *
     * @return array
     */
    public function getPosts()
    {
        return $this->database->select('posts', [
            'title',
            'slug',
            'body',
            'id'
        ], null, null, $this);
    }

    /**
     * Return a post based on params
     * If post doesn't exists, returns null
     *
     * @param mixed $column
     * @param mixed $value
     * @return Post|null
     */
    public function getPostByColumn($column, $value)
    {
        $post = $this->database->select('posts', [
            'title',
            'slug',
            'body',
            'id'
        ], ["{$column} = '{$value}'"], 1, $this);

        if ($post) {
            $post = $post[0];

            return $post;
        } else {
            return null;
        }
    }

    /**
     * Create a new post
     *
     * @return bool
     */
    public function createPost()
    {
        return $this->database->insert('posts', [
            'title' => $this->getTitle(),
            'slug' => $this->getSlug(),
            'body' => $this->getBody()
        ]);
    }

    /**
     * Updates an existing post
     *
     * @return bool
     */
    public function updatePost()
    {
        return $this->database->update('posts', [
            'title' => $this->getTitle(),
            'slug' => $this->getSlug(),
            'body' => $this->getBody()
        ], $this->getId());
    }

    /**
     * Deletes an existing post
     *
     * @return int
     */
    public function deletePost()
    {
        $id = intval($this->getId());

        return $this->database->delete('posts', [
            "id = {$id}"
        ], 1);
    }
}
