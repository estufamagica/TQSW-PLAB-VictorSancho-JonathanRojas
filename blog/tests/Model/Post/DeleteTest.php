<?php

namespace Tests\Model\Post;

use App\Model\Post\Create;
use App\Model\Post\Delete;
use App\Model\Post\Post;
use PHPUnit\Framework\TestCase;
use Tests\PDOStatementMock;

class DeleteTest extends TestCase
{
    public function testDeletePostIfExistsPostExpectsDelete() {
        $deletePost = new Delete((new PDOStatementMock)->create(['id' => 1,
            'idUser'=>'1', 'title' => 'Title'], []));
        $post = new Post("Title", "12345678901234567890", "admin@admin.com");
        $this->assertTrue($deletePost->delete($post, 1));
    }

    public function testDeletePostIfNotExistsPostExpectsFalse() {
        $deletePost = new Delete((new PDOStatementMock)->create([]));
        $post = new Post("Not exists", "12345678901234567890", "admin2@admin.com");
        $this->assertFalse($deletePost->delete($post, 0));
    }
}