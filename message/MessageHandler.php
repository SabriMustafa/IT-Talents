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
    public static function getInstance()
    {
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

    public static function printMessages()
    {
        $msgHandler = self::getInstance();
        foreach ($msgHandler->getMessages() as $message) {
            $style = 'color:green';
            if ($message['type'] === \Message\MessageHandler::MESSAGE_TYPE_ERROR) {
                $style = 'color:red';
            }
            echo "<p style=$style>" . $message['message'] . "</p>";
        }
    }

}