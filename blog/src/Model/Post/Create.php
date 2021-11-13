<?php

namespace App\Model\Post;

use PDO;

class Create
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function create(Post $post) : bool {
        $postByID =  $this->getPostByID($post->getId());
        if(!$postByID){
            $this->insert($post);

            return (bool) $this->getPostByID($post->getId());
        }
        return false;
    }

    private function getPostByID(string $id) {
        if(empty($id)) return null;
        $query = $this->connection->prepare('SELECT id, idUser, title FROM posts WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }

    private function insert(Post $post) {
        $query = $this->connection->prepare('INSERT INTO posts (id, subject, message, id_user) VALUES (:user_id, :subject, :message, :id_post)');
        $query->bindValue(':id', $post->getId());
        $query->bindValue(':subject', $post->getSubject());
        $query->bindValue(':message', $post->getMessage());
        $query->bindValue(':id_user', $post->getUserId());
        $query->execute();
    }


}