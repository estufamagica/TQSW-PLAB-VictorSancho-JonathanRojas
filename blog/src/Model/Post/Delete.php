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
        return true;
    }

}