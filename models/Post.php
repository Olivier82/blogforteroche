<?php
class Post {
    private $id;
    private $title;
    private $content;
    private $date;

    // Validation des données
    public function validateForm($data): array {
        $errors = array();
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor']));

        if (strlen($title) <= 8) {
            $errors['title'] = 'texte trop court !';
        }

        if (strlen($content) <= 250) {
            $errors['content'] = 'L\'article est trop court !';
        }

        return $errors;
    }

    public function createPost($data): bool {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));

        return true;
    }
}
