<?php

namespace Tests\Model\Post;

use App\Model\Post\Create;
use App\Model\Post\Post;
use App\Model\User\User;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    public function testCreatePostWithCorrectDataExpectsTrue() {
        $pdoStatementMock = $this->getMockBuilder(PDOStatement::class)
            ->setMethods(array('bind','execute'))
            ->disableOriginalConstructor()
            ->getMock();

        $pdoMock = $this->getMockBuilder(PDO::class)
            ->setMethods(array('prepare'))
            ->disableOriginalConstructor()
            ->getMock();

        $pdoMock->expects($this->never())
            ->method('prepare')
            ->willReturn($pdoStatementMock);


        $createPost = new Create($pdoMock);

        $this->assertFalse($createPost->create(new Post()));

    }

    public function testCreatePostWithInvalidDataExpectsFale() {

    }




}