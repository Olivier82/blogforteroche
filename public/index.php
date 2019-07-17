<?php
require '../vendor/autoload.php';

//Démarrage du router
$router = new AltoRouter();

//Chemin vers le dossier views
define('VIEW_PATH', dirname (__DIR__) . '/views');

//Gestion des URL
$router->map('GET', '/blog', function() {
    require VIEW_PATH . '/blog/index.php';
});

$router->map('GET', '/blog/about', function() {
    require VIEW_PATH . '/blog/about.php';
});

$router->map('GET', '/blog/post', function() {
    require VIEW_PATH . '/blog/post.php';
});

$router->map('GET', '/blog/contact', function() {
    require VIEW_PATH . '/blog/contact.php';
});

$router->map('GET', '/admin/post', function() {
    require VIEW_PATH . '/admin/post.php';
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