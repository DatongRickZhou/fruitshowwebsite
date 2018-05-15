<?php
class NewProduct extends Database{
    private $query;
    public function __construct($product_name,$product_price,$product_description,$product_quantity,$product_image,$categoryID){
        parent::__construct();
        $this -> query =
        'INSERT INTO `shoppingDB`.`productTable` (`productID`, `productName`, `price`, `productDes`, `avaliable`, `quantity`, `productImage_file_name`, `categoryID`)
        VALUES
        (NULL, ?, ?, ?, \'1\', ?, ?, ?)';

        $this -> getProducts($product_name,$product_price,$product_description,$product_quantity,$product_image,$categoryID);
    }
    private function getProducts($product_name,$product_price,$product_description,$product_quantity,$product_image,$categoryID){
        $statement = $this -> connection -> prepare($this -> query);
        $statement->bind_param('sisisi',$product_name,$product_price,$product_description,$product_quantity,$product_image,$categoryID);
        $statement -> execute();

    }
}
?>