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
        if((ctype_alnum($username))&&(!$userByEmail)&&($password_verify==$user->getPassword())){
            $this->insertUser($user, $username);
            return (bool) $this->getUserByEmail($user->getEmail());
        }

        return false;
    }

    private function getUserByEmail(string $email) {
        $query = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC) ?? null;
    }

    private function insertUser(User $user, string $username){
        $query = $this->connection->prepare('INSERT INTO users (id, username, email, password) VALUES (NULL, :username, :email, :password)');
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->execute();
    }




}