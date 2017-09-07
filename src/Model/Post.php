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
     * @return bool|array
     */
    public function createPost()
    {
        $validate = $this->validate();
        if ($validate['valid']) {
            return $this->database->insert('posts', [
                'title' => $this->getTitle(),
                'slug' => $this->getSlug(),
                'body' => $this->getBody()
            ]);
        } else {
            return $validate;
        }
    }

    /**
     * Updates an existing post
     *
     * @return bool|array
     */
    public function updatePost()
    {
        $validate = $this->validate();

        if ($validate['valid']) {
            return $this->database->update('posts', [
                'title' => $this->getTitle(),
                'slug' => $this->getSlug(),
                'body' => $this->getBody()
            ], $this->getId());
        } else {
            return $validate;
        }
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

    /**
     * Verify if all fields are ok to be inserted on database
     *
     * @return array
     */
    private function validate()
    {
        $result = [
            'valid' => true,
            'errors' => []
        ];

        if (! $this->getTitle()) {
            $result['errors'][] = 'O campo "Título" é obrigatório';
        } elseif (strlen($this->getTitle()) > 128) {
            $result['errors'][] = 'O campo "Título" deve ter no máximo 128 caracteres';
        }

        if (! $this->getSlug()) {
            $result['errors'][] = 'O campo "URL" é obrigatório';
        } elseif (strlen($this->getSlug()) > 255) {
            $result['errors'][] = 'O campo "URL" deve ter no máximo 255 caracteres';
        } elseif (! $this->getId()) {
            $existingPostURL = $this->getPostByColumn('slug', $this->getSlug());

            if ($existingPostURL) {
                $result['errors'][] = 'Já existe um post com essa URL.';
            }

            $existingPostTitle = $this->getPostByColumn('title', $this->getTitle());

            if ($existingPostTitle) {
                $result['errors'][] = 'Já existe um post com esse título.';
            }
        }

        if (! $this->getBody()) {
            $result['errors'][] = 'O campo "Conteúdo" é obrigatório';
        }

        if ($result['errors']) {
            $result['valid'] = false;
        }

        return $result;
    }
}
