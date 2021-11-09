<?php

namespace Tests\Model;

use App\Model\User;
use LogicException;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    //Register
    public function testLessEightCharactersExpectsException() {
        $this->expectException(LogicException::class);
        new User("admin@gmail.com", "1234567");
    }

    public function testNewUserWithCorrectPasswordExpectsCorrectPass() {

        $user = new User("admin@gmail.com", "12345678");
        $this->assertEquals("12345678", $user->getPassword());
    }



}