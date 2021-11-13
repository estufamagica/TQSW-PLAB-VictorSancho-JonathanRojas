<?php

namespace Tests\Model\Post;

use App\Model\Post\Create;
use App\Model\Post\Post;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;
use Tests\PDOStatementMock;

class CreateTest extends TestCase
{
    public function testCreatePostWithNotExistsPostExpectsTrue() {
        $createPost = new Create((new PDOStatementMock)->create([], ['id' => '1',
            'idUser'=>'1', 'title' => 'Title']));
        $post = new Post("1", "Title", "12345678901234567890", "1");
        $this->assertTrue($createPost->create($post));
    }

    public function testCreatePostWithExistsExpectsFalse() {

        $createPost = new Create((new PDOStatementMock)->create(['id' => '1',
            'idUser'=>'1', 'title' => 'Title']));
        $post = new Post("", "Title", "12345678901234567890", "Hola");
        $this->assertFalse($createPost->create($post));
    }
}