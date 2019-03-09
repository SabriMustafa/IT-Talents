<?php

namespace Message;

class MessageHandler
{
    public static $messageHandler;

    CONST MESSAGE_TYPE_ERROR = 'error';
    CONST MESSAGE_TYPE_SUCCESS = 'success';
    CONST MESSAGE_TYPE_NEUTRAL = 'neutral';

    private $message = [];

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

    public function addMessage($message, $type = MessageHandler::MESSAGE_TYPE_SUCCESS)
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
}