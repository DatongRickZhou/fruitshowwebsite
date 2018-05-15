<?php
class Products extends Database{
    private $query;
    public $products = array();
    public function __construct(){
        parent::__construct();
        $this -> query =
        'SELECT * FROM productTable WHERE avaliable=1';
        
        $this -> getProducts();
    }
    private function getProducts(){
        $statement = $this -> connection -> prepare($this -> query);
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