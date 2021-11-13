<?php

namespace Tests\Model\Post;

use App\Model\Post\InvalidMessageException;
use App\Model\Post\InvalidSubjectException;
use App\Model\Post\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testCreateValidPostExpectsTrue() {
        $post = new Post("Title", "12345678901234567890", "admin@admin.com");
        $this->assertEquals("Title", $post->getSubject());
        $this->assertEquals("12345678901234567890", $post->getMessage());
        $this->assertEquals("admin@admin.com", $post->getUserEmail());
    }

    public function testPostWithThreeCharactersSubjectExpectsException(){
        $this->expectException(InvalidSubjectException::class);
        new Post("abc", "Hola Pepito", "admin@admin.com");
    }

    public function testPostWithTwentyOneCharactersSubjectExpectsException(){
        $this->expectException(InvalidSubjectException::class);
        new Post("123456789012345678901", "Hola Pepito", "admin@admin.com");
    }

    public function testPostWithTwoHundredAndFiftySevenCharactersInMessageExpectsMaximumException() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, s";
        $this->expectException(InvalidMessageException::class);
        new Post("hola", $message, "admin@admin.com");
    }

    public function testPostWithTwoHundredAndFiftySixCharactersInMessageExpectsCorrect() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,.";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());
    }

    public function testPostWithMessageEmptyExpectsException() {
        $this->expectException(InvalidMessageException::class);
        new Post("Hola", "", "admin@admin.com");
    }

    public function testPostWithNineteenCharactersInMessageExpectsMinimumException() {
        $message =  "Lorem ipsum dolor s";
        $this->expectException(InvalidMessageException::class);
        new Post("hola", $message, "admin@admin.com");
    }

    public function testPostWithTwentyCharactersInMessageExpectsCorrect() {
        $message =  "Lorem ipsum dolor si";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());
    }

    public function testPostWithTwentyOneCharactersInMessageExpectsCorrect() {
        $message =  "Lorem ipsum dolor sii";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());
    }

    public function testPostWithSubjectEmptyExpectsException() {
        $this->expectException(InvalidSubjectException::class);
        new Post("", "Lorem ipsum dolor sii", "admin@admin.com");
    }

}