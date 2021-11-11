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
        $user_data = $this->getUserByEmail($user->getEmail());
        if ($user_data){
            return $user->getPassword()==$user_data['password'];
        }
        return false;
    }

    private function getUserByEmail(string $email) {
        $query = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }


}