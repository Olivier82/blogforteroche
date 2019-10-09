 <?php
 require_once '../models/Post.php';
 require_once '../models/Comment.php';


class BlogController {
    private $viewPath;

    function __construct(string $viewPath) {
        $this->viewPath = $viewPath;
    }

    public function indexAction() {
        $result = array(
            'title' => 'Bienvenue sur mon blog',
        );

        extract($result);

        $post = new Post();
        $lastposts = $post->homePosts();
        extract($lastposts);
        require $this->viewPath . '/blog/index.php';
    }

    public function aboutAction() {
        require $this->viewPath . '/blog/about.php';
    }

    public function postAction() {
        require $this->viewPath . '/blog/post.php';
    }

    public function contactAction() {
        require $this->viewPath .'/blog/contact.php';
    }

    public function singlePost(int $id) {
        $post = new Post();
        extract( array(
            'singlepost' => $post->singlePost($id),
            'scripts'  => array(
                '/assets/js/valideComment.js'
            )
        ));
        require $this->viewPath .'/blog/post.php';
    }

    public function addComment() {
        $data = json_decode(file_get_contents('php://input'), true);
        $data = (array)$data;

        header('Content-type: application/json');

        // Appel du model Comment
        $comment = new Comment();
        $errors = $comment->validateComment($data);

        if (count($errors) > 0) {
            echo json_encode(array(
                'errors' => $errors,
            ));

            return $errors;

        }

        $result = $comment->createComment($data);
        $response = array ('result' => $result);
        echo json_encode($response);
        var_dump($response);

        require $this->viewPath .'/blog/post.php';
    }

}
