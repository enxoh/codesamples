<?php

class Catalog extends Controller{

	function index(){
		
	}

	function details($id){

		// Get all products
        $products = $this->model('Products');  
        $products = $products->getProductDetails($id);
        $data['products'] = (array) $products;

        //var_dump($data['products']);

        $this->view('Catalog/productdetails', $data);
	}

}
?>