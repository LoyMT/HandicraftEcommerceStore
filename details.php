<?php 

$active='Cart';

include("db.php");
include("header.php");

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from product where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_desc = $row_products['product_desc'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_img2 = $row_products['product_img2'];
    
    $pro_img3 = $row_products['product_img3'];
            
}

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
            
           <div class="col-md-12"><!-- col-md-12 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   
                                   <?php
                                   
                                   if($pro_img2!=NULL){
                                       
                                       echo'
                                       
                                        <li data-target="#myCarousel" data-slide-to="1"></li>

                                       ';
                                   }
                                   
                                   if($pro_img3!=NULL){
                                       
                                       echo'
                                       
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        
                                       ';
                                   }
                                       
                                    ?>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a" style="width: 400px; height: 400px;"></center>
                                   </div>
                                   <?php
                                   
                                   if($pro_img2!=NULL){
                                       
                                       echo"
                                       
                                       <div class='item'>
                                           <center><img class='img-responsive' src='admin/product_images/$pro_img2' alt='Product 3-b' style='width: 400px; height: 400px;'></center>
                                       </div>
                                       
                                       ";
                                       
                                   }
                                   
                                   if($pro_img3!=NULL){
                                       
                                       echo"
                                       
                                       <div class='item'>
                                           <center><img class='img-responsive' src='admin/product_images/$pro_img3' alt='Product 3-c' style='width: 400px; height: 400px;'></center>
                                       </div>
                                       
                                       ";
                                       
                                   }
                                   ?>
                               </div>
                               
                               
                                   <?php
                                   
                                   if($pro_img2!=NULL && $pro_img3!=NULL){
                                       
                                       echo"
                                       
                                           <a href='#myCarousel' class='left carousel-control' data-slide='prev'><!-- left carousel-control Begin -->
                                               <span class='glyphicon glyphicon-chevron-left'></span>
                                               <span class='sr-only'>Previous</span>
                                           </a><!-- left carousel-control Finish -->

                                           <a href='#myCarousel' class='right carousel-control' data-slide='next'><!-- right carousel-control Begin -->
                                               <span class='glyphicon glyphicon-chevron-right'></span>
                                               <span class='sr-only'>Next</span>
                                           </a><!-- right carousel-control Finish -->
                                       
                                       ";
                                       
                                   }
                                   ?>
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->


                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <?php 

                                        echo "

                                            <p class='price'>

                                            PRICE: RM $pro_price

                                            </p>

                                        ";
                               
                               ?>
                               
                               <br><br>
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart" style="font-size:25px;"> Add to cart</button></p>
                               <br><br>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive" style="width: 150px; height: 100px;">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <?php

                           if($pro_img2!=NULL){

                               echo"
                                   <div class='col-xs-4'><!-- col-xs-4 Begin --><!-- col-xs-4 Begin -->
                                       <a data-target='#myCarousel' data-slide-to='1'  href='#' class='thumb'><!-- thumb Begin -->
                                           <img src='admin/product_images/$pro_img2' alt='product 2' class='img-responsive' style='width: 150px; height: 100px;'>
                                       </a><!-- thumb Finish -->
                                   </div><!-- col-xs-4 Finish -->
                                   ";
                               
                           }

                           if($pro_img3!=NULL){

                               echo"
                                   <div class='col-xs-4'><!-- col-xs-4 Begin -->
                                       <a data-target='#myCarousel' data-slide-to='2'  href='#' class='thumb'><!-- thumb Begin -->
                                           <img src='admin/product_images/$pro_img3' alt='product 3' class='img-responsive' style='width: 150px; height: 100px;'>
                                       </a><!-- thumb Finish -->
                                   </div><!-- col-xs-4 Finish -->
                                   ";
                               
                           }
                               
                            ?>
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->

               <div class="col-md-12 col-sm-6">
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Product Details</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <hr>
                   
               </div><!-- box Finish -->
              </div>
               
              <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline" style="height: 460px;"><!-- box same-height headline Begin -->
                           <br><br><br><br><br><br>
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                    $get_products = "select * from product order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                    $pro_id = $row_products['product_id'];
        
                    $pro_title = $row_products['product_title'];
                    
                    $pro_price = $row_products['product_price'];
                            
                    $pro_img1 = $row_products['product_img1'];
                    
            
                    $product_price = "  RM $pro_price  ";
            
                    
                    echo "
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>
                    
                        <div class='product'>
                        
                            <a href='details.php?pro_id=$pro_id'>
                            
                                <img class='img-responsive' src='admin/product_images/$pro_img1' style='width: 250px; height: 240px;'>
                            
                            </a>
                            
                            <div class='text-center' style='height: 80px;'>

                                <h3>
                        
                                    <a href='details.php?pro_id=$pro_id'>
            
                                        $pro_title
            
                                    </a>
                                
                                </h3>
                            </div>
                                <div class='text-center'>  
                                <p class='price'>
                                
                                <h4>$product_price &nbsp</h4>
                                
                                </p><br>
                                
                                <p class='button'>
                                
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
            
                                        View Details
            
                                    </a>
                                
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
            
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
            
                                    </a>
                                
                                </p>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    ";
                       
                   }
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   
   <?php 
    
    include("footer.php");
    
    ?>
    
	<script src="layout/styles/jquery-331.min.js"></script>
	<script src="layout/styles/bootstrap-337.min.js"></script>
    
    
</body>
</html>
