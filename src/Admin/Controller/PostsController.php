<?php
namespace Admin\Controller;

use Library\Auth;
use \Library\Controller;
use Library\Database;

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
        $database = new Database();
        $posts = $database->select('posts', [
            'title',
            'id'
        ]);

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
                $database = new Database();
                $database->insert('posts', [
                    'title' => $title,
                    'slug' => $slug,
                    'body' => $body
                ]);

                $params['result'] = 'Post publicado com sucesso!';
                $params['error'] = false;
            } catch (\Exception $e) {
                $params['result'] = 'Erro ao publicar post: ' . $e->getMessage();
                $params['error'] = true;
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
        $database = new Database();

        $postId = intval($getParams['id']);
        $post = $database->select('posts', [
            'title',
            'slug',
            'body'
        ], [
            "id = '{$postId}'"
        ], 1);

        if (! $post) {
            throw new \Exception('Post não encontrado');
        } else {
            $params['post'] = $post[0];
        }

        if (isset($_POST) && $_POST) {
            $title = filter_input(\INPUT_POST, 'title', \FILTER_SANITIZE_STRING);
            $slug = filter_input(\INPUT_POST, 'slug', \FILTER_SANITIZE_STRING);
            $body = filter_input(\INPUT_POST, 'body', \FILTER_SANITIZE_STRING);

            try {
                $database->update('posts', [
                    'title' => $title,
                    'slug' => $slug,
                    'body' => $body
                ], $postId);

                $params['result'] = 'Post atualizado com sucesso!';
                $params['error'] = false;
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
            $database = new Database();
            $database->delete('posts', [
                "id = '{$id}'"
            ], 1);

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
