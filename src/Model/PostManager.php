<?php 
    namespace App\Model;
    use App\Model\Manager;
    use \PDO;

    class PostManager extends Manager
    {
        public function getPosts(int $limit =  6): array
        {
    
            $req = $this->dbConnect()->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 0, :limit");
            $req->bindParam(':limit', $limit, PDO::PARAM_INT);
            $req->execute();
            $don = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $don;
        }

    }

?>