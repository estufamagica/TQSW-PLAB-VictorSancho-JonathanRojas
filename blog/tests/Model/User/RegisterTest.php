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
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "admin", "12345678"));
    }

    public function testEmptyNameExpectsIncorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "", "12345678"));
    }

    public function testIncorrectPasswordVerifyExpectsIncorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "admin", "afafajafaf"));
    }

    public function testIncorrectCharactersInNameExpectsIncorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "a!_::3HJ/", "12345678"));
    }

    public function testCorrectCharactersInNameExpectsCorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("paco2399@gmail.com", "paquito24");
        $this->assertTrue($register->register($user, "PacoX23", "paquito24"));
    }

    public function testTwentyCharactersNameExpectsCorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "12345678901234567890", "12345678"));
    }

    public function testTwentyOneCharactersNameExpectsIncorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "123456789012345678901", "12345678"));
    }

    public function testNineTeenCharactersNameExpectsCorrectRegister(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "1234567890123456789", "12345678"));
    }
}