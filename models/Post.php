<?php

class Post {

    private $bdd;
    private $id;
    private $title;
    private $content;
    private $date;
    private $data = array();
    private $errors;
    // Validation des données

    public function __construct() {
        $this->bdd = new PDO('mysql:host=localhost:3306;dbname=blog_bdd;charsetutf8', 'root', 'root');
    }

    public function validateForm($data) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $data['titlePost'];
            $content = $data['editor'];

            if(strlen(trim($title)) <= 8){
                $this->errors['title'] = 'texte trop court !';
            }

            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $title)) {
                $this->errors = 'Le titre ne peut contenir que des lettres et des chiffres !';
            }

            if($title ==''){
                $this->errors = 'Veuillez ajouter un titre !';
            }

            if($content =='') {
                $this->errors = 'Veuillez ajouter un texte à l\'article !';
            }

            if(strlen(trim($content)) <= 250){
                $this->errors = 'L\'article est trop court !';
            }
        }
    }
}