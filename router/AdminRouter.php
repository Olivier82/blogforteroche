<?php
include('../controllers/AdminController.php');

class AdminRouter {

    private $altoRouter;

    function __construct(AltoRouter $altoRouter) {
        $this->altoRouter = $altoRouter;
    }

    public function loadAdminRoute() {
        $this->altoRouter->map('GET', '/admin', function() {
            $adminController = new AdminController();
            $adminController->fiveLastPosts();
        });

        $this->altoRouter->map('GET', '/admin/addpost', function() {
            $adminController = new AdminController();
            $adminController->addPostScripts();
        });

        $this->altoRouter->map('POST', '/admin/addpost', function() {
            $adminController = new AdminController();
            $adminController->addPost();
        });

        $this->altoRouter->map('GET', '/admin/listingpost', function() {
            $adminController = new AdminController();
            $adminController->allPost();
        });

        $this->altoRouter->map('GET', '/admin/editpost/[i:id]', function($id) {
            $adminController = new AdminController();
            $adminController->getPost($id);
        });

        $this->altoRouter->map('POST', '/admin/editpost', function() {
            $adminController = new AdminController();
            $adminController->updatePost();
        });

        $this->altoRouter->map('POST', '/admin/deletepost/[i:id]', function($id) {
            $adminController = new AdminController();
            $adminController->deletePost($id);
        });
    }
}