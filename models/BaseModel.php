<?php

abstract class BaseModel {
    protected function bddConnect() {
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
}