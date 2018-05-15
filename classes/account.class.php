<?php
class account extends Database{
    public function __construct(){
    parent::__construct();
  }
  public function register($username,$password,$email,$image,$userlevel){
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
    $image=rand(1,5);
    if( count($errors) == 0 ){
      $query = 'INSERT INTO accounts 
      (userName,Emailaddress,userPassword,image,userlevel)
      VALUES
      ( ?, ? , ?, ?,1';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('ssss', $username, $email, $hash,$image);
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
}
?>
