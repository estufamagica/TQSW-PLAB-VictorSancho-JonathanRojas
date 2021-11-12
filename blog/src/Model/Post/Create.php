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
        return false;
    }


}