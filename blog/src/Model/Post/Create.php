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
        $postByID =  $this->getPostByEmail($post->getUserEmail());
        if(!$postByID){
            $this->insert($post);
            return $this->getPostByEmail($post->getUserEmail());
        }
        return false;
    }

    private function getPostByEmail(string $userEmail) {

        $query = $this->connection->prepare('SELECT id, userEmail, title FROM posts WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail);
        $query->execute();
        return (bool) $query->fetch(PDO::FETCH_ASSOC);
    }

    private function insert(Post $post) {
        $query = $this->connection->prepare('INSERT INTO posts (subject, message, userEmail) VALUES (:subject, :message, :userEmail)');
        $query->bindValue(':subject', $post->getSubject());
        $query->bindValue(':message', $post->getMessage());
        $query->bindValue(':userEmail', $post->getUserEmail());
        $query->execute();
    }


}