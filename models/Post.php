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
        try
        {
            $bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));

        $req = $bdd->prepare('INSERT INTO posts(title, content) VALUES(:title, :content)');
        $req->execute(array(
            'title' => $title,
            'content' => $content,
        ));
        echo 'Article a été ajouté avec succés.';
        return true;
    }
}
