<?php

namespace Tests\Model\Post;

use App\Model\Post\InvalidMessageException;
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

    public function testPostWithTwoHundredAndFiftySevenCharactersInMessageExpectsMaximumException() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, s";
        $this->expectException(InvalidMessageException::class);
        new Post("1", "hola", $message, "id_1");
    }

    public function testPostWithTwoHundredAndFiftySixCharactersInMessageExpectsCorrect() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,.";
        $post = new Post("1", "hola", $message, "id_1");
        $this->assertEquals($message, $post->getMessage());
    }

    public function testPostWithMessageEmptyExpectsException() {
        $this->expectException(InvalidMessageException::class);
        new Post("1", "", "12345678901234567890", "id_1");
    }

    public function testPostWithNineteenCharactersInMessageExpectsMinimumException() {

    }

    public function testPostWithTwentyCharactersInMessageExpectsCorrect() {

    }

    public function testPostWithTwentyOneCharactersInMessageExpectsCorrect() {

    }













}