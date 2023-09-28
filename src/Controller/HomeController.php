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

    public static function addComment(int $id): void
    {
        // test du $_POST
        if(empty($_POST['author']))
        {
            $err=1;
        }else{
            $author = htmlspecialchars($_POST['author']);
        }

        if(empty($_POST['comment']))
        {
            $err=2;
        }else{
            $comment = htmlspecialchars($_POST['comment']);
        }

        if(isset($err))
        {
            // gestion de l'erreur
            // redirection 
            header("LOCATION:index.php?action=post&id=".$id."&error=".$err);
        }else{
            // appel au model
            $commentManager = new CommentManager();
            $addComment = $commentManager->addComment($id, $author, $comment);
            if($addComment)
            {
                header("LOCATION:index.php?action=post&id=".$id);
            }else{
                header("LOCATION:index.php?action=post&id=".$id."&error=3");
            }
        }

    }

}

?>