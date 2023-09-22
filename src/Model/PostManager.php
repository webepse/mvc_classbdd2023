<?php 
    namespace App\Model;
    use App\Model\Manager;
    use \PDO;
    use App\Model\Outils\Post;

    class PostManager extends Manager
    {
        public function getPosts(int $limit =  6): array
        {
    
            $req = $this->dbConnect()->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 0, :limit");
            $req->bindParam(':limit', $limit, PDO::PARAM_INT);
            $req->execute();
            $don = $req->fetchAll(PDO::FETCH_CLASS, Post::class);
            $req->closeCursor();
            return $don;
        }

        public function getPost(int $id): object 
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts WHERE id=?");
            $req->execute([$id]);
            $req->setFetchMode(PDO::FETCH_OBJ);
            $data = $req->fetch();
            $req->closeCursor();

            return $data;
        }

    }

?>