<?php
class account extends Database{
    public function __construct(){
    parent::__construct();
  }
  public function register($username,$password,$email){
    $errors = array();
    //check the username
    if( strlen( trim($username) ) < 4 ){
      $errors["username"] = "at least 4 characters";
    }
    //validate the email
    if( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
      $errors["email"] = "invalid email address";
    }
    if( strlen( $password ) < 6 ){
      $errors["password"] = "password must be at least 6 characters";
    }
    if( count($errors) == 0 ){
      $query = 'INSERT INTO userTable 
      (userName,Emailaddress,userPassword,level)
      VALUES
      ( ?, ? , ?, 1)';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('sss', $username, $email, $hash);
      //execute query
      if( $statement -> execute() ){
        return true;
      }
      else{
        return false;
      }
    }
    else{
    }
    
  }
  public function checkUserName($userName){
    $query ='SELECT userName from userTable where userName=?'
    $statement = $this->connection->prepare($query);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result=$statement->get_result();
    if($result->num_rows>0){
      return true;
    }
    else
    {
      return false;
    }
  }
}
?>
