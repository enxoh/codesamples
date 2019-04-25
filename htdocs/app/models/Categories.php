<?php

class Categories extends Model{

	public $category_name;
    public $category_description;
    public $category_image;

    public function getCategory($category_id){
        $stmt = $this->_connection->prepare("SELECT * FROM category WHERE category_id = :category_id");
        $stmt->execute(['category_id' => $category_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Categories");
        return $stmt->fetch();
    }

    public function insertCategory(){
		$stmt = $this->_connection->prepare("INSERT INTO category(category_name, category_description, category_image) VALUES (:category_name, :category_description, :category_image)");
		$stmt->execute(['category_name' => $this->category_name, 'category_description' => $this->category_description, 'category_image' => $this->category_image]);		
		return $stmt->rowCount();		
    }

    public function selectAllCategories(){
        $stmt = $this->_connection->prepare("SELECT * FROM category ORDER BY category_name ASC");
        $stmt->execute();
        return $results = $stmt->fetchAll();
    }

    public function selectCategoryName(){
    	$stmt = $this->_connection->prepare("SELECT category_name FROM category ORDER BY category_name ASC");
        $stmt->execute();
        return $results = $stmt->fetchAll();
    }

    public function deleteSelectedCategory($category_id){
        $stmt = $this->_connection->prepare("DELETE FROM category WHERE category_id = :category_id");
        $stmt->execute(['category_id' => $category_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Categories");
        return $stmt->rowCount();
    }

}

?>