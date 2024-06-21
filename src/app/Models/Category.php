<?php

class Category {
    private $conn;
    private $table_name = "categories";

    public $id;
    public $title;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllCategories() {
        $query = "SELECT id, title FROM " . $this->table_name . " ORDER BY title";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
