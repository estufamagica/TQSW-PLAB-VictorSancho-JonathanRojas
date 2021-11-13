<?php

namespace App\Model;

use PDO;
use PDOException;

class DB
{
    private string $host = 'localhost';
    private string $dbname = 'blog';
    private string $username = 'user';
    private string $password = 'test';

    private static $instance;

    private PDO $conn;

    private function __construct()
    {

        try {
            $this->conn = new PDO(
                sprintf('mysql:dbname=%s;host=%s;charset=utf8mb4',
                    $this->dbname,
                    $this->host),
                $this->username,
                $this->password
            );
        }catch (PDOException $exception) {
            echo sprintf('Connection failed: %s', $exception->getMessage());
        }

    }

    public static function getInstance(): self {
        if(self::$instance == null) self::$instance = new self();
        return self::$instance;
    }

    public function connection(): PDO
    {
        return self::getInstance()->conn;
    }



}
