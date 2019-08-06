<?php

class Post {

    // Validation des données

    public function validateForm($data) {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if(strlen(trim($data['titlePost'])) <= 8){
                echo "Le titre est trop court !!!!";
            }else{
                echo "c'est bon";
            }

            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $data['titlePost'])) {
             echo  'Le titre ne peut contenir que des lettres et des chiffres';
            }

            if($data['titlePost'] ==''){
                echo 'Veuillez ajotuter un titre';
            }

            if(strlen(trim($data['editor'])) <= 250){
                echo "L'article est trop court !!!!";
            }else{
                echo "c'est bon";
            }
        }
    }

    //taille du titre if (strlen($titlePost) <= 8)

}