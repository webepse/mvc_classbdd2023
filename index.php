<?php 
namespace App;
use App\Controller\HomeController;

require('src/Autoloader.php');
Autoloader::register();

try{
    if(isset($_GET['action']))
    {

    }else{
        HomeController::listPost();
    }
}catch(Exception $e)
{
    $errorMessage = $e->getMessage();
}
