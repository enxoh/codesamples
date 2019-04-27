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

    public function getProduct($product_id){
        $stmt = $this->_connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Products");
        return $stmt->fetch();

    }

    public function editProduct(){
        $stmt = $this->_connection->prepare("UPDATE product SET product_name=:product_name, category=:category, product_description=:product_description, product_quantity=:product_quantity, product_status=:product_status, product_price=:product_price, sale_price=:sale_price WHERE product_id = :product_id");
        $stmt->execute(['product_id'=>$this->product_id,
            'product_name'=>$this->product_name,
            'category'=>$this->category,
            'product_description'=>$this->product_description,
            'product_quantity'=>$this->product_quantity,
            'product_status'=>$this->product_status,
            'product_price'=>$this->product_price,
            'sale_price'=>$this->sale_price]);
        return $stmt->rowCount();        
    }
    

    /* With picture
    public function editProduct(){
        $stmt = $this->_connection->prepare("UPDATE product SET product_name=:product_name, category=:category, product_description=:product_description, product_quantity=:product_quantity, product_status=:product_status, product_price=:product_price, sale_price=:sale_price, product_image=:product_image WHERE product_id = :product_id");
        $stmt->execute(['product_id'=>$this->product_id,
            'product_name'=>$this->product_name,
            'category'=>$this->category,
            'product_description'=>$this->product_description,
            'product_quantity'=>$this->product_quantity,
            'product_status'=>$this->product_status,
            'product_price'=>$this->product_price,
            'sale_price'=>$this->sale_price,
            'product_image'=>$this->product_image]);
        return $stmt->rowCount();        
    }
    */

    public function getLatestProducts(){
        $stmt = $this->_connection->prepare("SELECT * FROM product ORDER BY insert_date DESC LIMIT 6");
        $stmt->execute();
        return $results = $stmt->fetchAll();
    }

	public function insert(){
		$stmt = $this->_connection->prepare("INSERT INTO product(product_name, category, product_description, product_quantity, product_status, product_price, sale_price, product_image, insert_date) VALUES (:product_name, :category, :product_description, :product_quantity, :product_status, :product_price, :sale_price, :product_image, :insert_date)");
		$stmt->execute(['product_name' => $this->product_name, 'category' => $this->category, 'product_description' => $this->product_description, 'product_quantity' => $this->product_quantity, 'product_status' => $this->product_status, 'product_price' => $this->product_price, 'sale_price' => $this->sale_price, 'product_image' => $this->product_image, 'insert_date' => $this->insert_date]);		
		return $stmt->rowCount();
    }

    public function selectAllProducts(){
        $stmt = $this->_connection->prepare("SELECT * FROM product ORDER BY category ASC");
        $stmt->execute();
        return $results = $stmt->fetchAll();
    }

    public function deleteSelectedProduct($product_id){
        $stmt = $this->_connection->prepare("DELETE FROM product WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Products");
        return $stmt->rowCount();

    }

    //For product details page
    public function getProductDetails($product_id){
        $stmt = $this->_connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Products");
        return $stmt->fetch();
    }
}
?>