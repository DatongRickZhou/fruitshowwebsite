<?php include('autoloader.php'); 
?>
<!doctype html>
<html>
  <?php include ('includes/head.php'); ?>
  <body>
    <?php include('includes/nivbar.php'); ?>
    
    
    <script type="text/javascript">  
         $("#login-button").click(function(event){  
                 event.preventDefault();  
             $('form').fadeOut(500);  
             $('.wrapper').addClass('form-success');  
        });  
        function check(){  
        {  
          if(form.username.value == "")
          {  
            alert("enter your user name");  
            form.username.focus();  
            return false;  
          }  
          if(form.pass.value == "")
          {  
            alert("Enter your password！");  
            myform.pass.focus();  
            return false;  
          }  
        }  
    </script> 
    
    <div class="wrapper"></div>
        <div class="container content">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <?php
          if( count($account -> errors) > 0 ){
            $error_string = implode(' ', $account -> errors );
             $alert = "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                      $error_string
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                      </button>
                    </div>";
            echo $alert;
          }
         
          ?>
          
          <h4>Login to your account</h4>
          <form id="login-form" method="post" action="login.php" novalidate>
            <div class="form-group">
              <label for="credentials">Email address or User name</label>
              <input id="credentials" class="form-control" type="text" name="username" placeholder="example@example.com" required>
              <div class="invalid-feedback">Please type a valid username or email</div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" placeholder="your password" required>
              <div class="invalid-feedback">Please type a valid password</div>
            </div>
            <div class="text-center">
              <button type="submit" id="login-button" name="login" class="btn btn-outline-primary btn-block">Log in</button>
            </div>
            <p class="my-4">Don't have an account? <a href="register.php">Register</a> for a free account</p>
          </form>
        </div>
      </div>
    </div>

    
  </body>
</html>
