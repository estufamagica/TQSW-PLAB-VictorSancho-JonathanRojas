<?php

namespace App\Model\User;

use PDO;

class Register
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function register(User $user, string $username, string $password_verify) : bool {
        $userByEmail =  $this->getUserByEmail($user->getEmail());
        return empty($userByEmail);
    }

    private function getUserByEmail(string $email) {
        $query = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }




}