<?php include('autoloader.php'); 
$products_obj =new Products();
$categories_obj = new Categories();
?>
<!doctype html>
<html>
    <?php include ('includes/head.php'); ?>
<body>
    <?php include('includes/nivbar.php'); ?>
    <div class=container>
        <div class="row">
            <div class="col-sm-2">
                <?php
                if(count($categories_obj->categories)>0){
                    $col_counter =0;
                    foreach ($categories_obj->categories as $categories) {
                        $categoryID =$categories["categoryID"];
                        $categoryName=$categories["categoryName"];
                        
                        $col_counter++;
                        
                        if($col_counter==1){
                            echo "<ul>";
                            echo "<li><a class=\"active\" href=\"#$categoryName\">$categoryName</a></li>";
                        }
                        else{
                            echo "<li><a href=\"#$categoryName\">News</a></li>";
                        }
                    }
                    echo "</ul>";
                }
                ?>
            </div>
            <div class="col-sm-10" style="background:red">
                <?php
                if( count($products_obj -> products) > 0 ){
        //output the products
        $col_counter = 0;
        
        foreach( $products_obj -> products as $product){
          $product_id = $product["productID"];
          $product_name = $product["productName"];
          $product_price = $product["price"];
          $product_description = $product["productDes"];
          $product_image = $product["productImage_file_name"];
          $product_quantity=$product["quantity"];
          
          $col_counter++;
          if($col_counter == 1){
            echo "<div class=\"row\">";
          }
          echo "<div class=\"col-sm-3 product-column\">";
          echo "<h3 class=\"product-name\">$product_name</h3>";
          echo "<img class=\"product-thumbnail img-fluid\" src=\"images/products/$product_image\">";
          echo "<p class=\"price\">$product_price</p>";
          echo "<p class=\"quantity\">quantity:$product_quantity</p>";
          // echo "<p>product id: $id</p>";
          echo "<a href=\"detail.php?product_id=$product_id\">view</a>";
          echo "</div>";
          
          if($col_counter == 3){
            echo "</div>";
            echo "<hr>";
            $col_counter = 0;
          }
        }
      }
                ?>
            </div>
        </div> <!--row-->
    </div> <!-- container --> 
    
    </body>
</html>
