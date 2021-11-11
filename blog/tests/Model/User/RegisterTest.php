<?php

namespace Tests\Model\User;

use App\Model\User\Register;
use App\Model\User\User;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    public function testMailExistentBDExpectsIncorrectRegister(){

        $register = new Register((new \Tests\PDOStatementMock)->create(['email' => 'exists@gmail.com',
            'password'=>'12345678', 'id'=>'1', 'username' => 'admin']));

        $user = new User("exists@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "admin", "12345678"));
    }

    public function testNameEmailPasswordCorrectsExpectsCorrect(){

    }
}