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
        new User("admin@gmail.com", "1234567");
    }

    public function testMinimumCharactersInPasswordExpectsCorrectPass() {

        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("12345678", $user->getPassword());
    }

    public function testMoreSixteenCharactersExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("admin@gmail.com", "12345678901234567");
    }

    public function testSameSixteenCharactersExpectsCorrect() {
        $user = new User("admin@gmail.com", "1234567890123456");
        $this->assertEquals("1234567890123456", $user->getPassword());
    }

    public function testInvalidCharactersInPasswordExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("emai@gamil.com", "/123?::!");
    }

    public function testInvalidEmailExpectsException(){
        $this->expectException(InvalidEmailException::class);
        new User("admin", "12345678");
    }

    public function testValidCharactersInPasswordExpectsCorrect() {

        $user = new User("admin@gmail.com", "pP2ass12J34");
        $this->assertEquals("pP2ass12J34", $user->getPassword());
    }

    public function testValidEmailExpectsCorrectEmail(){
        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("admin@gmail.com", $user->getEmail());
    }



}