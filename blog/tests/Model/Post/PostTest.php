<?php

namespace Tests\Model\Post;

use App\Model\Post\InvalidSubjectException;
use App\Model\Post\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testCreateValidPostExpectsTrue() {
        $post = new Post("1","Title", "Hello world", "id_1");
        $this->assertEquals("1", $post->getId());
        $this->assertEquals("Title", $post->getSubject());
        $this->assertEquals("Hello world", $post->getMessage());
        $this->assertEquals("id_1", $post->getUserId());
    }

    public function testPostWithThreeCharactersSubjectExpectsException(){
        $this->expectException(InvalidSubjectException::class);
        new Post("1", "abc", "Hola Pepito", "id_1");
    }

    public function testPostWithTwentyOneCharactersSubjectExpectsException(){
        $this->expectException(InvalidSubjectException::class);
        new Post("1","123456789012345678901", "Hola Pepito", "id_1");
    }








}