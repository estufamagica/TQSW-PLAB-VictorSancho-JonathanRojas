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
    private string $userEmail;

    /**
     * @param string $subject
     * @param string $message
     * @param string $userEmail
     *
     */
    public function __construct(string $subject, string $message, string $userEmail)
    {
        $this->userEmail = $userEmail;

        if (!$this->isCorrectSubject($subject)) throw new InvalidSubjectException("Invalid Subject. Between 3 and 20 characters");
        if (!$this->isCorrectMessage($message)) throw new InvalidMessageException("Invalid Message.");
        $this->subject = $subject;
        $this->message = $message;

    }


    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    private function isCorrectSubject(string $subject): bool {
        return strlen($subject) > self::SUBJECT_MIN_LENGTH && strlen($subject) < self::SUBJECT_MAX_LENGTH;
    }

    private function isCorrectMessage(string $message): bool {
        return strlen($message) > self::MESSAGE_MIN_LENGTH && strlen($message) < self::MESSAGE_MAX_LENGTH ;
    }

}