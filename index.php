<?php 
namespace App;
use App\Controller\HomeController;

require('src/Autoloader.php');
Autoloader::register();

try{
    if(isset($_GET['action']))
    {
        if($_GET['action']=="listPost")
        {
            HomeController::listPost();
        }
        elseif($_GET['action']=="post")
        {
            if(isset($_GET['id']))
            {
                $id = htmlspecialchars($_GET['id']);
                HomeController::post($id);
            }else{
                throw new Exception("Il manque l'identifiant du post pour continuer");
            }
        }elseif($_GET['action']=="addcomment" && isset($_POST['author']))
        {
            if(isset($_GET['id']))
            {
                $id = htmlspecialchars($_GET['id']);
                HomeController::addComment($id);
            }else{
                throw new Exception("Il manque l'identifiant du post pour continuer");
            }
        }
        else{
            throw new Exception("La page que vous cherchez n'existe pas");
        }
    }else{
        HomeController::listPost();
    }
}catch(Exception $e)
{
    $errorMessage = $e->getMessage();
}
