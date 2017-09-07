<?php
namespace Front\Controller;

use \Library\Controller;
use Model\Post;

/**
 * Posts module controller (Front)
 *
 * @author David Lima
 */
class PostsController extends Controller
{
    public function readAction()
    {

        $slug = $this->getParam('slug');

        $model = new Post();
        $post = $model->getPostByColumn('slug', $slug);

        if (! $post) {
            throw new \Exception('Post not found');
        }

        $this->renderView('Front/View/readpost.phtml', [
            'title' => 'Front :: Bem vindo',
            'post' => $post
        ]);
    }
}
