<?php
require_once '../models/BaseModel.php';

class Post extends BaseModel {
    private $id;
    private $title;
    private $content;
    private $date_post;

    // Validation des données
    public function validateForm($data): array {
        $errors = array();
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor']));

        if (isset($data['idPost']) && !empty($data['idPost']) && !is_numeric($data['idPost'])) {
            $errors['idPost'] = 'L\' ID doit être un nombre';
        }

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

        return $req->execute();
    }

    // Récupération de tous les articles
    public function getPosts(): array {
        $bdd = $this->bddConnect();

        // Préparation de la requête
        $req = $bdd->query('SELECT id, title, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_post_fr  FROM posts ORDER BY date_post DESC');

        // Exécution de la requête
        $req->execute();

        // Récupération des données
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    //Récupération 5 derniers articles
    public function getLastPosts(): array {
        $bdd = $this->bddConnect();

        // Préparation de la requête
        $req = $bdd->query('SELECT id, title, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_post_fr FROM posts ORDER BY date_post DESC LIMIT 0, 5');

        // Exécution de la requéte
        $req->execute();

        // Récupération des données
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    //Mise à jour d'un article
    public function getPostById(int $id): array {
        $bdd = $this->bddConnect();
        //Préparation de la requête
        $req = $bdd->prepare('SELECT id, title, content FROM posts WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        //Exécution de la requête
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePost($data) {
        $bdd = $this->bddConnect();
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));
        $date_post = date('Y-m-d H:i:s');
        $id = intval($data['idPost']);

        //Préparation de la requête
        $req = $bdd->prepare('UPDATE posts SET title = :title, content = :content, date_post = :date_post WHERE id = :id');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':date_post', $date_post, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        return $req->execute();
    }

    // Suppression d'un article
    public function deletePost($id) {
        $bdd = $this->bddConnect();
        $req = $bdd->prepare('DELETE FROM posts WHERE id = :id LIMIT 1');
        $req->bindParam(':id',$id, PDO::PARAM_STR);
        return $req->execute();
    }

    //Récupération de 3 articles pour la homepage

    public function homePosts() {
        $bdd = $this->bddConnect();
        $req = $bdd->query('SELECT id, title, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_post_fr, content FROM posts ORDER BY id DESC LIMIT 3');
         // Exécution de la requête
        $req->execute();
        // Récupération des données
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function singlePost($id) {
        $bdd = $this->bddConnect();
        $req = $bdd->prepare('SELECT id, title, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_post_fr, content FROM posts WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
         //Exécution de la requête
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
