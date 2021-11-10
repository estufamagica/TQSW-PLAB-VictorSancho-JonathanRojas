<?php

namespace App\Model\User;

use PDO;

class Login
{
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function login(User $user) : bool{
        return (bool)$this->getUserByEmail($user->getEmail());
    }

    private function getUserByEmail(string $email) {
        $query = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;

    }


}