<?php

namespace App\Model\Post;

class Post
{
    private const SUBJECT_MIN_LENGTH = 3;
    private const SUBJECT_MAX_LENGTH = 21;
    private const MESSAGE_MAX_LENGTH = 257;
    private const MESSAGE_MIN_LENGTH = 19;
    private string $subject;
    private string $message;
    private string $user_id;
    private string $id;

    /**
     * @param string $id
     * @param string $subject
     * @param string $message
     * @param string $user_id
     */
    public function __construct(string $id, string $subject, string $message, string $user_id)
    {

        $this->id = $id;
        $this->user_id = $user_id;

        if (!$this->isCorrectSubject($subject)) throw new InvalidSubjectException("Invalid Subject. Between 3 and 20 characters");
        if (!$this->isCorrectMessage($message)) throw new InvalidMessageException("Invalid Message.");
        $this->subject = $subject;
        $this->message = $message;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


    public function getUserId(): string
    {
        return $this->user_id;
    }

    private function isCorrectSubject(string $subject): bool {
        return strlen($subject) > self::SUBJECT_MIN_LENGTH && strlen($subject) < self::SUBJECT_MAX_LENGTH;
    }

    private function isCorrectMessage(string $message): bool {
        return strlen($message) > self::MESSAGE_MIN_LENGTH && strlen($message) < self::MESSAGE_MAX_LENGTH ;
    }

}