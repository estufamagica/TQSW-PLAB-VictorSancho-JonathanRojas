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
            'userEmail'=>'admin@admin.com', 'title' => 'Title']));
        $post = new Post("Title", "12345678901234567890", "admin@admin.com");
        $this->assertTrue($createPost->create($post));
    }

    public function testCreatePostWithExistsExpectsFalse() {

        $createPost = new Create((new PDOStatementMock)->create(['id' => '1',
            'userEmail'=>'admin@admin.com', 'title' => 'Title']));
        $post = new Post("", "12345678901234567890", "admin@admin.com");
        $this->assertFalse($createPost->create($post));
    }
}