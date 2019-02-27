<?php

namespace Message;

class MessageHandler
{
    public static $messageHandler;

    CONST MESSAGE_TYPE_ERROR = 'error';
    CONST MESSAGE_TYPE_SUCCESS = 'success';
    CONST MESSAGE_TYPE_NEUTRAL = 'neutral';

    private $message = [];
    private $error = [];
    private $neutral = [];
    private $success = [];

    private function __construct()
    {
    }

    /**
     * @return MessageHandler
     */
    public static function getInstance() {
        if (self::$messageHandler === null) {
            self::$messageHandler = new MessageHandler();
        }

        return self::$messageHandler;
    }

    public function addMessage($message, $type)
    {
        $this->message[] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function getMessages()
    {
        return $this->message;
    }
    public function setError($message)
    {
        $this->error[] = $message;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setNeutral($message)
    {
        $this->neutral[] = $message;
    }

    public function getNeutral()
    {
        return $this->neutral;
    }

    public function setSuccess($message)
    {
        $this->success[] = $message;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function getAllMessages()
    {
        return [
            'error' => $this->error,
            'neutral' => $this->neutral,
            'success' => $this->success,
        ];
    }
}