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

    public function testMailCorrectExistsInBDWrongPasswordExpectsFalse() {
        $login = new login((new \Tests\PDOStatementMock)->create(['email' => 'test@gmail.com',
            'password'=>'12345678', 'id'=>'1']));

        $user = new User("test@gmail.com", "afdafafaf");
        $this->assertFalse($login->login($user));

    }
    public function testCorrectLoginExpectsLogin() {
        $login = new login((new \Tests\PDOStatementMock)->create(['email' => 'test@gmail.com',
            'password'=>'12345678', 'id'=>'1']));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($login->login($user));
    }
}