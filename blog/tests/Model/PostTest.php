<?php

namespace Tests\Model;

use App\Model\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testCreateValidPostExpectsTrue() {
        $post = new Post("Title", "Hello world", "id_1");
        $this->assertTrue($post->create(), "Valid post");
    }

    public function testCreateInvalidPostExpectsFalse(){
        $post = new Post("Title", "", "id_1");
        $this->assertFalse($post->create(), "Invalid post");
    }


}