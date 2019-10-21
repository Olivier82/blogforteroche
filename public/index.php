<?php
require '../vendor/autoload.php';
include('../router/AdminRouter.php');
include('../router/BlogRouter.php');

//Chemin vers le dossier views
define('VIEW_PATH', dirname (__DIR__) . '/views');

//Démarrage du router
$router = new AltoRouter();

$adminRouter = new AdminRouter($router);
$adminRouter->loadAdminRoute();

$blogRouter = new BlogRouter($router);
$blogRouter->loadBlogRoute();

// URL De la demande actuelle
$match = $router->match();

// Appel de la fonction
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    // Si aucune route
	header( $_SERVER["SERVER_PROTOCOL"] . ' ERREUR 404');
}
