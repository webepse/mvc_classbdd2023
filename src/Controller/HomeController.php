<?php
namespace App\Controller;

use App\Model\PostManager;

class HomeController{

    public static function listPost()
    {

        $postManager = new PostManager();

        $posts = $postManager->getPosts();

        require("view/frontend/listPostView.php");
    }


}

?>