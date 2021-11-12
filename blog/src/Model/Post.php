<?php

namespace App\Model;

class Post
{
    private string $subject;
    private string $message;
    private string $user_id;

    /**
     * @param string $subject
     * @param string $message
     * @param string $user_id
     */
    public function __construct(string $subject, string $message, string $user_id)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->user_id = $user_id;
    }

    public function create() : bool {
        return true;
    }

    public function delete() : bool {
        return true;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }



}