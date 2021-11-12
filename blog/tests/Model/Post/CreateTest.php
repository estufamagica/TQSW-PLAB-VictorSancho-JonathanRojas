<?php

namespace Tests\Model\Post;

use App\Model\Post\Create;
use App\Model\Post\Post;
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

        $pdoMock->expects($this->any())
            ->method('prepare')
            ->willReturn($pdoStatementMock);


        $createPost = new Create($pdoMock);
        $post = new Post("1", "Title", "12345678901234567890", "1");
        $this->assertTrue($createPost->create($post));

    }

    public function testCreatePostWithInvalidDataExpectsFalse() {
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
        $post = new Post("", "Title", "12345678901234567890", "");
        $this->assertFalse($createPost->create($post));
    }
}