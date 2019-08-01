<?php

class AdminController {

    private $titlePost;
    private $editor;

    public function addPost($data) {

        $request = array(
            'title' => $data['titlePost'],
            'contenu'  => $data['editor'],
        );
        extract($request);
        echo "$title, $contenu";

   }
}