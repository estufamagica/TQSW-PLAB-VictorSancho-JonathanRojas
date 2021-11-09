<?php

namespace App\Model\User;

class User
{
    const MIN_LENGTH = 8;
    const MAX_LENGHT = 16;
    private $email;
    private $password;

    public function __construct(string $email, string $password)
    {
        if (!$this->isCorrectPassword($password)) throw new InvalidPasswordException("Invalid Password");
        $this->email = $email;
        $this->password = $password;

    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    private function isCorrectPassword(string $password) : bool {
        return strlen($password) >= self::MIN_LENGTH && strlen($password)<=self::MAX_LENGHT;
    }

}