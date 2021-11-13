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
        $resultPost = $this->getPostByEmail($post->getUserEmail(), $post->getSubject(), $post->getMessage() );
        if(!$resultPost){
            $this->insert($post);
            return $this->getPostByEmail($post->getUserEmail(), $post->getSubject(), $post->getMessage() );
        }
        return false;
    }

    private function getPostByEmail(string $userEmail, string $subject, string $message) {
        $query = $this->connection->prepare('SELECT id, userEmail, subject FROM posts WHERE 
                                               userEmail = :userEmail AND subject = :subject AND message = :message');
        $query->bindValue(':userEmail', $userEmail);
        $query->bindValue(':subject', $subject);
        $query->bindValue(':message', $message);
        $query->execute();
        return (bool) $query->fetch(PDO::FETCH_ASSOC);
    }

    private function insert(Post $post) {
        echo "INSERT FUNCTION";
        $query = $this->connection->prepare('INSERT INTO posts (subject, message, userEmail) VALUES (:subject, :message, :userEmail)');
        $query->bindValue(':subject', $post->getSubject());
        $query->bindValue(':message', $post->getMessage());
        $query->bindValue(':userEmail', $post->getUserEmail());
        $query->execute();
    }


}