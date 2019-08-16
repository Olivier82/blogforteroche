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
            $errors['title'] = 'Le titre ne comporte pas assez de caractères !';
        }

        if (strlen($content) <= 250) {
            $errors['content'] = 'L\'article ne comporte pas assez de caractères !';
        }

        return $errors;
    }

    // Création d'un article
    public function createPost($data): bool {
        try
        {
            $bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
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
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':date_post', $date_post, PDO::PARAM_STR);
        // Exécution requête avec un tableau
        $req->execute();
        echo 'Article a été ajouté avec succés.';
        return true;
    }

    // Récupération de tous les articles
    public function getPosts() {
        try
        {
            $bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
        }
        catch (PDOException $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        // Préparation de la requête
        $req = $bdd->prepare("SELECT `id`, `title` FROM `posts` ORDER BY `date_post`");
        // Exécution de la requête
        $req->execute();
        // Récupération des données
        $results = $req->fetchAll();
        var_dump($results);
    }
}
