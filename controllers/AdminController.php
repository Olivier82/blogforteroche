<?php

require_once '../models/Post.php';


class AdminController {
    private $data;
    private $titlePost;
    private $editor;

    public function addPost() {
        $data = json_decode(file_get_contents('php://input'), true);
        $data = (array)$data;

        header('Content-Type: application/json');

        // Appel du model Post
        $post = new Post();
        $errors = $post->validateForm($data);

        if (count($errors) > 0) {
            echo json_encode(array(
                'errors' => $errors,
            ));

            return $errors;

        }

        $result = $post->createPost($data);
        $response = array('result' => $result);
        echo json_encode($response);
        return $response;
    }

    // Récupération des articles
    public function allPost() {
        $post = new Post;
        $listposts = $post->getPosts();
        extract($listposts);
        require_once('../views/admin/listing_post.php');
    }

    //Update des articles
    public function editPost() {
        $post = new Post;
        $editpost = $post->editPost();
        extract($editpost);
        require_once('../views/admin/edit_post.php');
    }
}
