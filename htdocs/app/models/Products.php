<?php

class Products extends Model{

	public $product_name;
    public $category;
    public $product_description;
    public $product_quantity;
    public $product_status;
    public $product_price;
    public $sale_price;
    public $product_image;

    public function getProduct(){

    }

	public function insert(){
		$stmt = $this->_connection->prepare("INSERT INTO product(product_name, category, product_description, product_quantity, product_status, product_price, sale_price, product_image) VALUES (:product_name, :category, :product_description, :product_quantity, :product_status, :product_price, :sale_price, :product_image)");
		$stmt->execute(['product_name' => $this->product_name, 'category' => $this->category, 'product_description' => $this->product_description, 'product_quantity' => $this->product_quantity, 'product_status' => $this->product_status, 'product_price' => $this->product_price, 'sale_price' => $this->sale_price, 'product_image' => $this->product_image]);		
		return $stmt->rowCount();
    }
}

?>