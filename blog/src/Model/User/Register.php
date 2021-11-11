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
        return true;
    }

    private function ifExistsEmailInBD(string $email)
    {

    }




}