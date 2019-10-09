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

        if (strlen($author) <= 3) {
            $errors['author'] = 'Le nom ne comporte pas assez de caractères !';
        }

        if (strlen($comment) <= 10) {
            $errors['comment'] = 'Le commentaire ne comporte pas assez de caractères !';
        }

        return $errors;
    }

    // Création d'un commentaire
    public function createComment($data): bool {
        $bdd = $this->bddConnect();
        $author = trim(strip_tags($data['author']));
        $comment = trim(strip_tags($data['comment']));
        $date_comment = date("Y-m-d H:i:s");
        $id_post = intval($data['idPost']);

        // Préparation de la requête d'ajout d'un commentaire
        $req = $bdd->prepare('INSERT INTO post_comment(author, comment, date_comment, id_post) VALUES(:author, :comment, :date_comment, :id_post');
        $req->bindValue(':author', $author, PDO::PARAM_STR);
        $req->bindValue(':comment', $comment, PDO::PARAM_STR);
        $req->bindValue(':date_comment', $date_comment, PDO::PARAM_STR);
        $req->bindValue(':id_post', $id_post, PDO::PARAM_INT);

        return $req->execute();
    }


}