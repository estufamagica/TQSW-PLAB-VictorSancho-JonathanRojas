<?php

namespace Tests\Model\User;

use App\Model\User\Login;
use App\Model\User\User;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{

    public function testMailNonExistentBDExpectsIncorrectLogin(){

        $login = new Login((new \Tests\PDOStatementMock)->create([]));

        $user = new User("exists@gmail.com", "12345678");
        $this->assertFalse($login->login($user));
    }

    public function testMailCorrectExistsInBDExpectCorrectEmail() {

    }

    public function testWrongPasswordBDExpectsIncorretLogin(){

    }

    public function testCorrectLoginExpectsLogin() {

    }
}