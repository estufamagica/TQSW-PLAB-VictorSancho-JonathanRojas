<?php

namespace App\Model\User;

class Register
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function ifExistsEmailInBD(string $email)
    {

    }

    public function register(User $user) : bool {
        return true;
    }


}