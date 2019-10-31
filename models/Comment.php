<?php
require_once '../models/BaseModel.php';

class Comment extends BaseModel {
    private $id;
    private $id_post;
    private $author;
    private $comment;
    private $date_comment;

    // Validation des données
    public function validateComment($data): array {
        $errors = array();
        $author = trim(strip_tags($data['author']));
        $comment = trim(strip_tags($data['comment']));

        if (strlen($author) <= 2) {
            $errors['author'] = 'Le nom ne comporte pas assez de caractères !';
        }

        if (strlen($comment) <= 3) {
            $errors['comment'] = 'Le commentaire ne comporte pas assez de caractères !';
        }

        return $errors;
    }

    // Création d'un commentaire
    public function createComment($data): bool {
        $bdd = $this->bddConnect();
        $author = trim(strip_tags($data['author']));
        $comment = trim(strip_tags($data['comment']));
        $date_comment = date('Y-m-d H:i:s');
        $id_post = intval($data['idPost']);
        $reported = $data['reported'];

        // Préparation de la requête d'ajout d'un commentaire
        $req = $bdd->prepare('INSERT INTO post_comment(author, comment, date_comment, reported, id_post) VALUES(:author, :comment, :date_comment, :reported, :id_post)');
        $req->bindValue(':author', $author, PDO::PARAM_STR);
        $req->bindValue(':comment', $comment, PDO::PARAM_STR);
        $req->bindValue(':date_comment', $date_comment, PDO::PARAM_STR);
        $req->bindValue(':reported', $reported, PDO::PARAM_BOOL);
        $req->bindValue(':id_post', $id_post, PDO::PARAM_INT);

        return $req->execute();
    }

    // Affichage des commentaires
    public function getCommentByPostId(int $id_post): array {
        $bdd = $this->bddConnect();
        // Préparation de la requête
        $req = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS date_comment_fr, id_post FROM post_comment WHERE id_post = :id_post ORDER BY date_comment DESC');
        $req->bindValue(':id_post', $id_post, PDO::PARAM_INT);
        $req->execute();
        //Récupération des données
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Signalement d'un commentaire
    public function alertComment(int $id) {
        $bdd = $this->bddConnect();
        //Préparation de la requête
        $req = $bdd->prepare('UPDATE post_comment SET reported = 0 WHERE id = :id');
        $req->bindParam(':id',$id, PDO::PARAM_INT);
        $req->bindParam(':reported', $reported, PDO::PARAM_INT);
        return $req->execute();
    }
}
