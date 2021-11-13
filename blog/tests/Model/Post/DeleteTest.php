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
        $deletePost = new Delete((new PDOStatementMock)->create(['id' => '1',
            'idUser'=>'1', 'title' => 'Title'], []));
        $post = new Post("1", "Title", "12345678901234567890", "1");
        $this->assertTrue($deletePost->delete($post));
    }

    public function testDeletePostIfNotExistsPostExpectsFalse() {
        $deletePost = new Delete((new PDOStatementMock)->create([]));
        $post = new Post("2", "Not exists", "12345678901234567890", "1");
        $this->assertFalse($deletePost->delete($post));
    }
}