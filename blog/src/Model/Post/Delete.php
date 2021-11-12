<?php

namespace App\Model\Post;

use PDO;

class Delete
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    private function delete() : bool {
        return true;
    }
}