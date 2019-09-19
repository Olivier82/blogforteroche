 <?php

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

}
