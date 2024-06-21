<?php

require __DIR__ . '/../Models/Tweet.php';

class TweetListener
{
    private $mqService;
    private $tweet;

    public function __construct($tweet)
    {
        $this->mqService = new MessageQueueService();
        $this->tweet = $tweet;
    }

    public function listen()
    {
        while (true) {
            $message = $this->mqService->receiveMessage('tweets');
            if ($message) {
                $data = json_decode($message, true);
                $this->tweet->create($data);
            }
            sleep(1); // Задержка между проверками
        }
    }
}
