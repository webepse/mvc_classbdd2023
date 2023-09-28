<?php
namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;

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
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($id);

        require("view/frontend/postView.php");
    }

}

?>