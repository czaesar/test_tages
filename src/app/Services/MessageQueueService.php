<?php

require_once 'config/redis.php';

class MessageQueueService {
    private $redis;
    private $queue_name = 'tweet_queue';

    public function __construct() {
        $redisClient = new RedisClient();
        $this->redis = $redisClient->getRedis();
    }

    public function enqueue($message) {
        $this->redis->lPush($this->queue_name, json_encode($message));
    }

    public function dequeue() {
        return json_decode($this->redis->rPop($this->queue_name), true);
    }
}
