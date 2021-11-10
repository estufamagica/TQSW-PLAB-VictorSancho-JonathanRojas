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

    public function testNewUserWithCorrectPasswordExpectsCorrectPass() {

        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("12345678", $user->getPassword());
    }

    public function testMoreSixteenCharactersExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("admin@gmail.com", "12345678901234567");
    }

    public function testInvalidEmailExpectsException(){
        $this->expectException(InvalidEmailException::class);
        new User("admin", "12345678");
    }

    public function testValidEmailExpectsCorrectEmail(){
        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("admin@gmail.com", $user->getEmail());
    }



}