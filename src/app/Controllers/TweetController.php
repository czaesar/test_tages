<?php

require_once __DIR__ . '/../Models/Tweet.php';

class TweetController {
    private $tweetModel;

    public function __construct($tweetModel) {
        $this->tweetModel = $tweetModel;
    }

    public function index() {
        return $this->tweetModel->read();
    }

    public function store($data) {
        $this->tweetModel->category_id = $data['category_id'];
        $this->tweetModel->username = $data['username'];
        $this->tweetModel->content = $data['content'];
        $this->tweetModel->created_at = date('Y-m-d H:i:s');

        return $this->tweetModel->create();
    }
}
