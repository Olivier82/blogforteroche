<?php
include('../controllers/BlogController.php');

class BlogRouter {

    private $altoRouter;

    function __construct(AltoRouter $altoRouter) {
        $this->altoRouter = $altoRouter;
    }

    public function loadBlogRoute() {
        $this->altoRouter->map('GET', '/', function() {
            $blogController = new BlogController(VIEW_PATH);
            $blogController->indexAction();
        });

        $this->altoRouter->map('GET', '/about', function() {
            $blogController = new BlogController(VIEW_PATH);
            $blogController->aboutAction();
        });

        $this->altoRouter->map('GET', '/contact', function() {
            $blogController = new BlogController(VIEW_PATH);
            $blogController -> contactAction();
        });

        $this->altoRouter->map('GET', '/post/[i:id]', function($id) {
            $blogController = new BlogController(VIEW_PATH);
            $blogController->singlePost($id);
        });

        $this->altoRouter->map('POST', '/post', function() {
            $blogController = new BlogController(VIEW_PATH);
            $blogController->addComment();
        });
    }
}