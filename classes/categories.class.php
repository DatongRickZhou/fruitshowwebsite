<?php
class Categories extends Database{
    private $query;
    public $categories =array();
    public function __construct(){
        parent::__construct();
        $this -> query =
        'SELECT * FROM categoryTable';
        
        $this ->getCategories();
    }
    
    private function getCategories(){
        $statement = $this ->connection ->prepare($this ->query);
        $statement ->execute();
        $result =$statement ->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($this->categories,$row);
            }
        }
        else{
            throw new Exception("query returned no result");
        }
    }
}
?>