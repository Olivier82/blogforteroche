<?php
class Post {
    private $id;
    private $title;
    private $content;
    private $date_post;

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
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            die('Erreur : ' .$e->getMessage());
        }

        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));
        $date_post = date("Y-m-d H:i:s");
        // Préparation de la requête d'ajout d'un post
        $req = $bdd->prepare("INSERT INTO `posts`(`title`, `content`, `date_post`) VALUES(:title, :content, :date_post)");
        // Exécution requête avec un tableau
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':date_post', $date_post, PDO::PARAM_STR);
        $req->execute();
        echo 'Article a été ajouté avec succés.';
        return true;
    }
}
