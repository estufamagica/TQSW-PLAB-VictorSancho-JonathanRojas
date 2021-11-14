<?php

namespace Tests\Model\User;

use App\Model\User\Register;
use App\Model\User\User;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    public function testMailExistentBDExpectsFalse(){

        $register = new Register((new \Tests\PDOStatementMock)->create(['email' => 'exists@gmail.com',
            'password'=>'12345678', 'id'=>'1', 'username' => 'admin']));

        $user = new User("exists@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "admin", "12345678"));
    }

    public function testNameEmailPasswordCorrectsExpectsTrue(){
        $register = new Register((new \Tests\PDOStatementMock)->create([], ["test@gmail.com", "12345678"]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "admin", "12345678"));
    }

    public function testEmptyNameExpectsFalse(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "", "12345678"));
    }

    public function testIncorrectPasswordVerifyExpectsFalse(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "admin", "afafajafaf"));
    }

    public function testIncorrectCharactersInNameExpectsFalse(){
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "a!_::3HJ/", "12345678"));
    }

    public function testCorrectCharactersInNameExpectsTrue(){
        $register = new Register((new \Tests\PDOStatementMock)->create([], ['email' => 'paco2399@gmail.com',
            'password'=>'paquito24', 'id'=>'1', 'username' => 'PacoX23']));

        $user = new User("paco2399@gmail.com", "paquito24");
        $this->assertTrue($register->register($user, "PacoX23", "paquito24"));
    }

    public function testTwentyCharactersNameExpectsTrue(){ //Valor frontera
        $register = new Register((new \Tests\PDOStatementMock)->create([], ['email' => 'tests@gmail.com',
            'password'=>'12345678', 'id'=>'1', 'username' => '12345678901234567890']));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "12345678901234567890", "12345678"));
    }

    public function testTwentyOneCharactersNameExpectsFalse(){ //Valor límit superior al màxim
        $register = new Register((new \Tests\PDOStatementMock)->create([]));

        $user = new User("test@gmail.com", "12345678");
        $this->assertFalse($register->register($user, "123456789012345678901", "12345678"));
    }

    public function testNineTeenCharactersNameExpectsTrue(){    //Valor limit inferior al màxim
        $register = new Register((new \Tests\PDOStatementMock)->create([], ['email' => 'tests@gmail.com',
            'password'=>'12345678', 'id'=>'1', 'username' => '1234567890123456789']));

        $user = new User("test@gmail.com", "12345678");
        $this->assertTrue($register->register($user, "1234567890123456789", "12345678"));
    }
}