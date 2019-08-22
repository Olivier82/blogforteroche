<?php
class Post {
    private $id;
    private $title;
    private $content;
    private $date_post;

     //Connection à la base de données
     public function bddConnect() {
        try
        {
            $bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        }
        catch (PDOException $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
    }

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

        $bdd = $this->bddConnect();

        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));
        $date_post = date("Y-m-d H:i:s");
        // Préparation de la requête d'ajout d'un post
        $req = $bdd->prepare('INSERT INTO posts(title, content, date_post) VALUES(:title, :content, :date_post)');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':date_post', $date_post, PDO::PARAM_STR);
        $req->execute();

        return true;
    }

    // Récupération de tous les articles
    public function getPosts() {

        $bdd = $this->bddConnect();
        // Préparation de la requête
        $req = $bdd->prepare('SELECT id, title, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_post_fr  FROM posts ORDER BY date_post DESC');
        // Exécution de la requête
        $req->execute();
        // Récupération des données
        $listposts = $req->fetchAll(PDO::FETCH_ASSOC);
        return $listposts;
    }

    //Mise à jour d'un article

    public function editPost($id) {

            $bdd = $this->bddConnect();
            //Préparation de la requête
            $req = $bdd->prepare('SELECT title, content FROM posts WHERE id = :id');
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            //Exécution de la requête
            $req->execute();
            $editpost = $req->fetch(PDO::FETCH_ASSOC);
            return $editpost;
    }

}
