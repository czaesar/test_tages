<?php

class Tweet {
    private $conn;
    private $table_name = "tweets";

    public $id;
    public $category_id;
    public $username;
    public $content;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET category_id=:category_id, username=:username, content=:content, created_at=:created_at";
        $stmt = $this->conn->prepare($query);

        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":created_at", $this->created_at);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read() {
        $query = "SELECT t.id, c.title as category_title, t.username, t.content, t.created_at 
                  FROM " . $this->table_name . " t 
                  LEFT JOIN categories c ON t.category_id = c.id 
                  ORDER BY t.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
