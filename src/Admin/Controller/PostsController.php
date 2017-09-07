<?php
namespace Admin\Controller;

use Library\Auth;
use \Library\Controller;
use Library\Database;
use Model\Post;

/**
 * Admin posts controller
 *
 * @author David Lima
 */
class PostsController extends Controller
{

    /**
     * Prevents non-authenticated users to access restrict area
     */
    public function __construct()
    {
        if (! Auth::isAuthenticated()) {
            header('Location: /admin/auth/');
            exit();
        }
    }

    /**
     * List all posts to user and give it option to edit or delete items
     */
    public function indexAction()
    {
        $post = new Post();
        $posts = $post->getPosts();

        $this->renderView('Admin/View/listposts.phtml', [
            'title' => 'Admin :: Listar posts',
            'posts' => $posts
        ]);
    }

    /**
     * Create a new post based on data entered by user
     */
    public function createAction()
    {
        $params = [
            'title' => 'Admin :: Criar post'
        ];

        if (isset($_POST) && $_POST) {
            $title = filter_input(\INPUT_POST, 'title', \FILTER_SANITIZE_STRING);
            $slug = filter_input(\INPUT_POST, 'slug', \FILTER_SANITIZE_STRING);
            $body = filter_input(\INPUT_POST, 'body', \FILTER_SANITIZE_STRING);

            try {
                $post = new Post();
                $insert = $post->setTitle($title)
                    ->setSlug($slug)
                    ->setBody($body)
                    ->createPost();

                if (true !== $insert) {
                    $params['error'] = true;
                    if (is_array($insert)) {
                        $params['result'] = implode('<br>', $insert['errors']);
                    }
                    $params['post'] = $post;
                } else {
                    $params['result'] = 'Post publicado com sucesso!';
                    $params['error'] = false;
                }
            } catch (\Exception $e) {
                $params['result'] = 'Erro ao publicar post: ' . $e->getMessage();
                $params['error'] = true;
                $params['post'] = $post;
            }
        }

        $this->renderView('Admin/View/postform.phtml', $params);
    }

    /**
     * Edit an existing post
     *
     * @throws \Exception
     */
    public function editAction()
    {
        $params = [
            'title' => 'Admin :: Editar post'
        ];

        $getParams = $this->getParams();

        $postId = intval($getParams['id']);

        $model = new Post();
        $post = $model->getPostByColumn('id', $postId);

        if (! $post) {
            throw new \Exception('Post não encontrado');
        } else {
            $params['post'] = $post;
        }

        if (isset($_POST) && $_POST) {
            $title = filter_input(\INPUT_POST, 'title', \FILTER_SANITIZE_STRING);
            $slug = filter_input(\INPUT_POST, 'slug', \FILTER_SANITIZE_STRING);
            $body = filter_input(\INPUT_POST, 'body', \FILTER_SANITIZE_STRING);

            try {
                $post = new Post();
                $update = $post->setTitle($title)
                    ->setSlug($slug)
                    ->setBody($body)
                    ->setId($postId)
                    ->updatePost();


                if (true !== $update) {
                    $params['error'] = true;
                    if (is_array($update)) {
                        $params['result'] = implode('<br>', $update['errors']);
                    }
                } else {
                    $params['result'] = 'Post atualizado com sucesso!';
                    $params['error'] = false;
                    $params['post'] = $post;
                }
            } catch (\Exception $e) {
                $params['result'] = 'Erro ao atualizar post: ' . $e->getMessage();
                $params['error'] = true;
            }
        }

        $this->renderView('Admin/View/postform.phtml', $params);
    }

    /**
     * Delete an existing post
     */
    public function deleteAction()
    {
        header('Content-Type: Application/JSON');

        $id = $this->getParam('id');

        try {
            $post = new Post();
            $post->setId($id)
                ->deletePost();

            $result = [
                'error' => false,
                'result' => 'Post apagado com sucesso!'
            ];
        } catch (\Exception $e) {
            $result = [
                'error' => true,
                'result' => "Erro ao apagar o post: " . $e->getMessage()
            ];
        }

        echo json_encode($result);
        exit();
    }
}
