<?php
namespace Front\Controller;

use \Library\Controller;
use Model\Post;

/**
 * Default Front Module Controller
 *
 * @author David Lima
 */
class DefaultController extends Controller
{
    public function indexAction()
    {

        $post = new Post();
        $posts = $post->getPosts();

        $this->renderView('Front/View/index.phtml', [
            'title' => 'Front :: Bem vindo',
            'posts' => $posts
        ]);
    }
}
