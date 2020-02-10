<?php
require __DIR__.'/BaseModel.php';
class ProductModel extends BaseModel {
    public $productId;
    public $productName;
    public $description;
    public $imageUrl;
    public $price;
    public $shippingCost;
}
?>