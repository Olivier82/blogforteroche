<?php

require_once '../models/Post.php';

class AdminController {
    private $titlePost;
    private $editor;

    public function addPost() {
        $data = json_decode(file_get_contents('php://input'), true);
        $data = (array)$data;

        // Appeler ton model
        // => Insérer en base de donnée
        // => renvoyé une valeur en cas d'erreur ou du succès
        // Retour du controlleur: succès de l'insertion en bdd ou pas

        $response = array(
            'title' => $data['titlePost'],
            'contenu'  => $data['editor'],
        );

        header('Content-Type: application/json');
        echo json_encode($response);

        // Appel du model Post
        $Post = new Post();
        $validatePost = $Post->validateForm();
    }
}
