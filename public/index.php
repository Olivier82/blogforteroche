<?php
require '../vendor/autoload.php';
include('../controllers/BlogController.php');
include('../controllers/AdminController.php');

//Démarrage du router
$router = new AltoRouter();

//Chemin vers le dossier views
define('VIEW_PATH', dirname (__DIR__) . '/views');

//Gestion des URL
$router->map('GET', '/', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->indexAction();
});

$router->map('GET', '/about', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->aboutAction();
});

$router->map('GET', '/post', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->postAction();
});

$router->map('GET', '/contact', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController -> contactAction();
});

$router->map('GET', '/post/[i:id]', function($id) {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->singlePost($id);
});

$router->map('POST', '/post', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->addComment();
});

$router->map('GET', '/admin', function() {
    require VIEW_PATH . '/admin/index.php';
});

$router->map('GET', '/admin/addpost', function() {
    $adminController = new AdminController();
    $adminController->addPostScripts();
});

$router->map('POST', '/admin/addpost', function() {
    $adminController = new AdminController();
    $adminController->addPost();
});

$router->map('GET', '/admin/listingpost', function() {
    $adminController = new AdminController();
    $adminController->allPost();
});

$router->map('GET', '/admin/editpost/[i:id]', function($id) {
    $adminController = new AdminController();
    $adminController->getPost($id);
});

$router->map('POST', '/admin/editpost', function() {
    $adminController = new AdminController();
    $adminController->updatePost();
});

$router->map('POST', '/admin/deletepost/[i:id]', function($id) {
    $adminController = new AdminController();
    $adminController->deletePost($id);
});


// URL De la demande actuelle
$match = $router->match();

// Appel de la fonction
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    // Si aucune route
	header( $_SERVER["SERVER_PROTOCOL"] . ' ERREUR 404');
}
