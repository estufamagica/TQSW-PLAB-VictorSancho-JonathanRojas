<?php

namespace Tests;

use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class PDOStatementMock extends TestCase
{
    public function create(... $expectedReturns) {
        $PDOStatementMock = $this->getMockBuilder(PDOStatement::class)
            ->setMethods(array('fetch', 'bindValue', 'execute'))
            ->disableOriginalConstructor()
            ->getMock();

        $PDOStatementMock->expects($this->any())
            ->method('fetch')
            ->willReturn(...$expectedReturns);

        $connectionMock = $this->getMockBuilder(PDO::class)
            ->setMethods(array('prepare'))
            ->disableOriginalConstructor()
            ->getMock();

        $connectionMock->expects($this->any())
            ->method('prepare')
            ->willReturn($PDOStatementMock);

        return $connectionMock;
    }


}