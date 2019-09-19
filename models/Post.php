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

        if (isset($data['id']) && !empty($data['id']) && !is_numeric($data['id'])) {
            $errors['id'] = 'L\' ID doit être un nombre';
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

    //Mise à jour d'un article
    public function getPostById(int $id): array {
        $bdd = $this->bddConnect();
        //Préparation de la requête
        $req = $bdd->prepare('SELECT id, title, content FROM posts WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        //Exécution de la requête
        $req->execute();
        $editpost = $req->fetch(PDO::FETCH_ASSOC);
        return $editpost;
    }

    public function updatePost($data) {
        $bdd = $this->bddConnect();
        $title = trim(strip_tags($data['titlePost']));
        $content = trim(strip_tags($data['editor'], '<p><a><h1><h2><strong><em><u><s><img>'));
        $date_post = date('Y-m-d H:i:s');
        $id = intval($data['id']);

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
}
