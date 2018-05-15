<?php include('autoloader.php'); 
$product_name;
$product_price;
$product_description;
$product_quantity;
$product_image;
$categoryID;
?>
<!doctype html>
<html>
    <?php include ('includes/head.php'); ?>
<body>
    <?php include('includes/nivbar.php'); ?>
<div class=container>
        <div class="row">
        <div class="col-sm-2">
           <ul>
               <li>
                   <a class="active" href="#addnewproduct">Add new products</a>
               </li>
               <li>
                   <a class="active" href="#deleteproduct">Delete product</a>   
               </li>
               <li>
                   <a class="active" href="#modifyproducts">modify products</a>
               </li>
           </ul>
        </div>
        <div class="col-sm-10">
            //main menu page
        </div>
        </div>
</div>
</body>
</html>
