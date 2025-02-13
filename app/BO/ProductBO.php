<?php 

namespace App\BO;

class ProductBO {
    public $id, $name, $description, $sku, $price, $category_id;
    public function __construct($product) {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->sku = $product->sku;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
    }
}
