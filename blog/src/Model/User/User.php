<?php

namespace App\Model\User;

class User
{
    const MIN_LENGTH = 8;
    const MAX_LENGHT = 16;
    private $email;
    private $password;
    private $username;

    public function __construct(string $email, string $password)
    {
        if (!$this->isCorrectEmail($email)) throw new InvalidEmailException("Invalid Email");
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

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    private function isCorrectPassword(string $password) : bool {
        return strlen($password) >= self::MIN_LENGTH && strlen($password) <= self::MAX_LENGHT
            && ctype_alnum($password);
    }

    private function isCorrectEmail(string $mail) : bool {
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

    private function isCorrectUsername(string $username) : bool {
        return true;
    }

}