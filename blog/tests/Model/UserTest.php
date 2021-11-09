<?php

namespace Tests\Model;

use App\Model\User\User;
use App\Model\User\InvalidPasswordException;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    //Register
    public function testLessEightCharactersExpectsException() {
        $this->expectException(InvalidPasswordException::class);
        new User("admin@gmail.com", "1234567");
    }

    public function testNewUserWithCorrectPasswordExpectsCorrectPass() {

        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("12345678", $user->getPassword());
    }

    public function testMoreSixteenCharactersExpectsException() {

    }



}