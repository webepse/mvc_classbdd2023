<?php
namespace App\Model;
use \PDO;
use \Exception;

class Manager{
    private $dbName = "blog2";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbHost = "localhost";

    private $bdd;

    private function dbConnect()
    {
        if($this->bdd === NULL)
        {
            // instance de PDO
            try{
                $bdd = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=utf8",$this->dbUser,$this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $this->bdd = $bdd;
            }catch(Exception $e)
            {
                die('ERREUR '.$e->getMessage());
            }
        }
        return $this->bdd;
    }
}

