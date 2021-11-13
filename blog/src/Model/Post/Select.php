<?php

namespace App\Model\Post;

use PDO;

class Select
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function getPosts() {
        $query = $this->connection->prepare('Select * FROM posts');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



}