<?php
require '../vendor/autoload.php';
include('../controllers/BlogController.php');
include('../controllers/AdminController.php');

//Démarrage du router
$router = new AltoRouter();

//Chemin vers le dossier views
define('VIEW_PATH', dirname (__DIR__) . '/views');

//Gestion des URL
$router->map('GET', '/blog', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->indexAction();
});

$router->map('GET', '/blog/about', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->aboutAction();
    require VIEW_PATH . '/blog/about.php';
});

$router->map('GET', '/blog/post', function() {
    require VIEW_PATH . '/blog/post.php';
});

$router->map('GET', '/blog/contact', function() {
    require VIEW_PATH . '/blog/contact.php';
});

$router->map('GET', '/admin/addpost', function() {
    require VIEW_PATH . '/admin/add_post.php';
});

$router->map('POST', '/admin/addpost', function() {
    $adminController = new AdminController();
    $adminController->addPost();
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
