<?php

require_once __DIR__ . '/../Models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct($categoryModel) {
        $this->categoryModel = $categoryModel;
    }

    public function index() {
        return $this->categoryModel->getAllCategories();
    }
}
