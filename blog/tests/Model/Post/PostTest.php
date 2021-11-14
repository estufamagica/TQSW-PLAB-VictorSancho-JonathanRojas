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
        new Post("abc", "Hola Pepito", "admin@admin.com");          //valor limit inferior al valor frontera minim(4)
    }

    public function testPostWithTwentyOneCharactersSubjectExpectsException(){
        $this->expectException(InvalidSubjectException::class);
        new Post("123456789012345678901", "Hola Pepito", "admin@admin.com");        //valor limit superior al valor frontera màxim(20)
    }

    public function testPostWithTwoHundredAndFiftySevenCharactersInMessageExpectsMaximumException() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, s";
        $this->expectException(InvalidMessageException::class);
        new Post("hola", $message, "admin@admin.com");          //valor limit superior al valor frontera maxim
    }

    public function testPostWithTwoHundredAndFiftySixCharactersInMessageExpectsCorrect() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,.";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());             //valor frontera maxim
    }

    public function testPostWithMessageEmptyExpectsException() {
        $this->expectException(InvalidMessageException::class);
        new Post("Hola", "", "admin@admin.com");
    }

    public function testPostWithNineteenCharactersInMessageExpectsMinimumException() {
        $message =  "Lorem ipsum dolor s";
        $this->expectException(InvalidMessageException::class);
        new Post("hola", $message, "admin@admin.com");      //valor limit inferior al valor frontera minim
    }

    public function testPostWithTwentyCharactersInMessageExpectsCorrect() {
        $message =  "Lorem ipsum dolor si";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());                 //valor frontera
    }

    public function testPostWithTwentyOneCharactersInMessageExpectsCorrect() {
        $message =  "Lorem ipsum dolor sii";
        $post = new Post("hola", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());                 //valor limit superior al valor frontera minim
    }

    public function testPostWithSubjectEmptyExpectsException() {
        $this->expectException(InvalidSubjectException::class);
        new Post("", "Lorem ipsum dolor sii", "admin@admin.com");
    }

    public function testPostWithFourCharactersInSubjectExpectsCorrect() {
        $subject =  "hola"; //Valor limit (4)
        $post = new Post($subject, "Lorem ipsum dolor sii", "admin@admin.com");
        $this->assertEquals($subject, $post->getSubject());
    }

    public function testPostWithTwentyCharactersInSubjectExpectsCorrect() {
        $subject =  "12345678901234567890"; //Valor limit(20)
        $post = new Post($subject, "Lorem ipsum dolor sii", "admin@admin.com");
        $this->assertEquals($subject, $post->getSubject());
    }

    public function testPostWithTwoHundredAndFiftyFiveCharactersInMessageExpectsCorrect() {
        $message = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,";
        //Valor limit(255)
        $post = new Post("Title", $message, "admin@admin.com");
        $this->assertEquals($message, $post->getMessage());
    }
    public function testPostWithIncorrectCharactersInSubjectExpectsException() {
        return \LogicException::class;
    }
    public function testPostWithIncorrectCharactersInMessageExpectsException() {
        return \LogicException::class;
    }



}