<?php
require '../vendor/autoload.php';
include('../controllers/BlogController.php');
include('../router/AdminRouter.php');

//Chemin vers le dossier views
define('VIEW_PATH', dirname (__DIR__) . '/views');

//Démarrage du router
$router = new AltoRouter();

$adminRouter = new AdminRouter($router);
$adminRouter->loadAdminRoute();

//Gestion des URL
$router->map('GET', '/', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->indexAction();
});

$router->map('GET', '/about', function() {
    $blogController = new BlogController(VIEW_PATH);
    $blogController->aboutAction();
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

// URL De la demande actuelle
$match = $router->match();

// Appel de la fonction
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    // Si aucune route
	header( $_SERVER["SERVER_PROTOCOL"] . ' ERREUR 404');
}
