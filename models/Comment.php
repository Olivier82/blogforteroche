<?php
require_once '../models/BaseModel.php';

class Comment extends BaseModel {

    // Validation des données
    public function validateComment($data): array {
        $errors = array();
        $author = trim(strip_tags($data['author']));
        $comment = trim(strip_tags($data['comment']));

        if (strlen($author) <= 3) {
            $errors['author'] = 'Le nom ne comporte pas assez de caractères !';
        }

        if (strlen($comment) <= 50) {
            $errors['comment'] = 'Le commentaire ne comporte pas assez de caractères !';
        }

        return $errors;
    }

    // Création d'un commentaire
    public function createComment($data): bool {
        $bdd = $this->bddConnect();
        $authors = trim(strip_tags($data['author']));
        $comment = trim(strip_tags($date['comment']));
        $date_comment = date("Y-m-d H:i:s");

        // Préparation de la requête d'ajout d'un commentaire
        $req = $bdd->prepare('INSERT INTO post_comment(author, comment, date_comment) VALUES(:author, :comment, :date_comment');
        $req->bindValue(':author', $author, PDO::PARAM_STR);
        $req->bindValue(':comment', $comment, PDO::PARAM_STR);
        $req->bindValue(':date_comment', $date_comment, PDO::PARAM_STR);

        return $req->execute();
    }


}