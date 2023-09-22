<?php
namespace App\Controller;

use App\Model\PostManager;

class HomeController{

    public static function listPost(): void
    {

        $postManager = new PostManager();

        $posts = $postManager->getPosts();

        require("view/frontend/listPostView.php");
    }

    public static function post(int $id): void
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($id);

        require("view/frontend/postView.php");
    }

}

?>