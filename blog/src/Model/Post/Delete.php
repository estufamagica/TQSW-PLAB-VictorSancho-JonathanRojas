<?php

namespace App\Model\Post;

use PDO;

class Delete
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    public function delete(Post $post) : bool {
        $postByID =  $this->getPostByID($post->getId());
        if($postByID){
            $this->deletePost($post);
            return !$this->getPostByID($post->getId());
        }
        return false;
    }

    private function deletePost(Post $post){
        $query = $this->connection->prepare('DELETE FROM posts WHERE id = :id AND userId = :userId LIMIT 1');
        $query->bindValue(':id', $post->getId());
        $query->bindValue(':id_user', $post->getUserId());
        $query->execute();
    }
    private function getPostByID(string $id) {
        if(empty($id)) return null;
        $query = $this->connection->prepare('SELECT id, idUser, title FROM posts WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }


}