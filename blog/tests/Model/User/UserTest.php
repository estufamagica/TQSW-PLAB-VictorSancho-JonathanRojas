<?php

namespace Tests\Model\User;

use App\Model\User\InvalidEmailException;
use App\Model\User\User;
use App\Model\User\InvalidPasswordException;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testLessEightCharactersExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("admin@gmail.com", "1234567");     //valor limit inferior al valor frontera del minim de caracters
    }

    public function testMinimumCharactersInPasswordExpectsCorrectPass() {

        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("12345678", $user->getPassword());      //valor frontera minim
    }

    public function testMoreSixteenCharactersExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("admin@gmail.com", "12345678901234567");  //valor limit superior al valor frontera maxim
    }

    public function testSameSixteenCharactersExpectsCorrect() {
        $user = new User("admin@gmail.com", "1234567890123456");
        $this->assertEquals("1234567890123456", $user->getPassword());  //valor frontera maxim
    }

    public function testInvalidCharactersInPasswordExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("emai@gamil.com", "/123?::!");  //Valor de la partició equivalent de contrasenyes amb caràcters invalids
    }

    public function testInvalidEmailExpectsException(){
        $this->expectException(InvalidEmailException::class);
        new User("admin", "12345678");      //Valor de la partició equivalent de emails invalids
    }

    public function testValidCharactersInPasswordExpectsCorrect() {

        $user = new User("admin@gmail.com", "pP2ass12J34");
        $this->assertEquals("pP2ass12J34", $user->getPassword());       //Valor de la partició equivalent de contrasenyes amb caràcters valids
    }

    public function testValidEmailExpectsCorrectEmail(){
        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("admin@gmail.com", $user->getEmail());      //Valor de la partició equivalent de emails valids
    }



}