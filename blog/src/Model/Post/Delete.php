<?php

namespace App\Model\Post;

use PDO;

class Delete
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    public function delete(Post $post, int $id) : bool {
        $postByID =  $this->getPostByUserEmail($post->getUserEmail());
        if($postByID){
            $this->deletePost($post);
            return !$this->getPostByUserEmail($post->getUserEmail());
        }
        return false;
    }

    private function deletePost(Post $post, int $id){
        $query = $this->connection->prepare('DELETE FROM posts WHERE id = :id AND userEmail = :userEmail LIMIT 1');
        $query->bindValue(':userEmail', $post->getUserEmail());
        $query->bindValue(':id', $id);
        $query->execute();
    }
    private function getPostByUserEmail(string $userEmail) {
        if(empty($id)) return null;
        $query = $this->connection->prepare('SELECT id, userEmail, title FROM posts WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }


}