<?php
class Products extends Database{
    private $query;
    public $products = array();
    //hey Datong, the function name is __construct, you wrote _construct()
    public function __construct(){
        parent::__construct();
        $this -> query =
        'SELECT * FROM productTable WHERE avaliable=1 and productTable.categoryID=?';
        
        $this -> getProducts();
    }
    private function getProducts($category){
        $statement = $this -> connection -> prepare($this -> query);
        $statement->bind_parm('s',$category);
        $statement -> execute()
        else{
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
}
?>