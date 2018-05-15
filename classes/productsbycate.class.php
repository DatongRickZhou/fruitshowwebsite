<?php
class ProductsbyCate extends Database{
    private $query;
    public $products = array();
    public function __construct($category){
        parent::__construct();
        $this -> query =
        'SELECT * FROM productTable WHERE avaliable=1 and productTable.categoryID=?';
        
        $this -> getProducts($category);
    }
    private function getProducts($category){
        $statement = $this -> connection -> prepare($this -> query);
        $statement->bind_param('i',$category);
        $statement -> execute();
        $result = $statement -> get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($this->products,$row);
            }
        }
        else{
            throw new Exception("query returned no result");
        }
    }
}
?>