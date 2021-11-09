<?php

namespace App\Model;

use LogicException;

class User
{
    const MIN_LENGTH = 8;
    private $email;
    private $password;

    public function __construct(string $email, string $password)
    {
        if(!$this->isCorrectPassword($password)) throw new LogicException("Invalid Password");
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
        return strlen($password) >= self::MIN_LENGTH;
    }

}