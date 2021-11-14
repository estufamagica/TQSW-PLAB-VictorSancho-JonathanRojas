<?php

namespace Tests\Model\User;

use App\Model\User\Login;
use App\Model\User\User;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{

    public function testMailNonExistentBDExpectsIncorrectLogin(){

        $login = new Login((new \Tests\PDOStatementMock)->create([])); //mock de la BD, will return []

        $user = new User("exists@gmail.com", "12345678");   //aquest usuari no existeix a la BD
        $this->assertFalse($login->login($user));
    }

    public function testMailCorrectExistsInBDWrongPasswordExpectsFalse() {
        $login = new login((new \Tests\PDOStatementMock)->create(['email' => 'test@gmail.com',
            'password'=>'12345678', 'id'=>'1']));       //mock de la BD, will return array associatiu del User

        $user = new User("test@gmail.com", "afdafafaf");    //contrasenya incorrecte de l'usuari
        $this->assertFalse($login->login($user));

    }
    public function testCorrectLoginExpectsLogin() {
        $login = new login((new \Tests\PDOStatementMock)->create(['email' => 'test@gmail.com',
            'password'=>'12345678', 'id'=>'1']));               //mock de la BD, will return array associatiu del user

        $user = new User("test@gmail.com", "12345678");         //contrasenya correcte per l'usuari
        $this->assertTrue($login->login($user));
    }
}