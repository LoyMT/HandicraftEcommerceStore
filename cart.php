<?php 

    $active='Cart';
    include("header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
            
           <div id="cart" class="col-md-12"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th colspan="2">Delete</th>
                                       <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                  
                                  <?php 
                       
                                   $ip_add = getRealIpUser();

                                   $select_cart = "select * from cart where ip_add='$ip_add'";

                                   $run_cart = mysqli_query($con,$select_cart);
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_qty = $row_cart['qty'];

                                     $pro_sale = $row_cart['p_price'];
                                       
                                       $get_products = "select * from product where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $sub_total = $pro_sale*$pro_qty;
                                           
                                           $total += $sub_total;
                                           
                                   ?>
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <td>
                                           
                                           <img class="img-responsive" src="admin/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <div class="display_quantity">
                                               
                                           <button type="submit" name="minus" class="<?php if($pro_qty==1) echo 'btn btn-default disabled'; else echo 'btn btn-default' ?>" value="<?php echo $pro_id; ?>"><!-- btn btn-default Begin -->
                                   
                                               <i class="fa fa-minus"></i>

                                           </button><!-- btn btn-default Finish -->
                                            
                                            <div class="quantity">
                                               
                                            <?php echo $pro_qty; ?>
                                                
                                            </div>
                                               
                                           <button type="submit" name="plus" class="btn btn-default" value="<?php echo $pro_id; ?>"><!-- btn btn-default Begin -->
                                   
                                               <i class="fa fa-plus"></i>

                                           </button><!-- btn btn-default Finish -->
                                               
                                            </div>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <b>RM </b><?php echo $pro_sale; ?>
                                           
                                       </td>
                                       
                                       <td colspan="2">
                                           
                                           <button type="submit" name="remove" class="btn btn-default" value="<?php echo $pro_id; ?>"><!-- btn btn-default Begin -->
                                   
                                               <i class="fa fa-trash"></i>

                                           </button><!-- btn btn-default Finish -->
                                           
                                       </td>
                                       
                                       <td >
                                           
                                           <b>RM </b><?php echo $sub_total; ?>
                                           
                                       </td>
                                       
                                   </tr><!-- tr Finish -->
                                   
                                   <?php } } ?>
                                   
                               </tbody><!-- tbody Finish -->
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="6">Total</th>
                                       <th colspan="2">RM <?php echo $total; ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="product.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                               <a href="checkout.php" class="btn btn-primary">
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
               <?php 
                        
                    $ip_add = getRealIpUser();

                   if(isset($_POST['minus'])){

                        $update_id = $_POST['minus'];

                        $get_pro = "select * from cart where p_id='$update_id' and ip_add='$ip_add'";

                        $run_get_pro = mysqli_query($con, $get_pro);

                        $row_get_pro = mysqli_fetch_array($run_get_pro);

                        $quantity = $row_get_pro['qty'];

                        $up_qty = $quantity - 1;

                       if($up_qty<=0){

                            echo "<script>alert('Reached the minimum quantity.')</script>";

                            echo "<script>window.open('cart.php','_self')</script>";

                        }else{
                           
                           $minus_product = "update cart set qty='$up_qty' where p_id='$update_id' and ip_add='$ip_add'";

                            $run_minus_product = mysqli_query($con,$minus_product);

                            if($run_minus_product){

                                echo "<script>alert('Successfully minus your product.')</script>";

                                echo "<script>window.open('cart.php','_self')</script>";

                            }
                           
                       }

                    }

                   if(isset($_POST['plus'])){

                        $update_id = $_POST['plus'];

                        $get_pro = "select * from cart where p_id='$update_id' and ip_add='$ip_add'";

                        $run_get_pro = mysqli_query($con, $get_pro);

                        $row_get_pro = mysqli_fetch_array($run_get_pro);

                        $quantity = $row_get_pro['qty'];

                        $up_qty = $quantity + 1;

                        $plus_product = "update cart set qty='$up_qty' where p_id='$update_id' and ip_add='$ip_add'";

                        $run_plus_product = mysqli_query($con,$plus_product);

                        if($run_plus_product){

                            echo "<script>alert('Successfully add your product.')</script>";

                            echo "<script>window.open('cart.php','_self')</script>";

                        }
                        
                    }

                   if(isset($_POST['remove'])){

                        $remove_id = $_POST['remove'];

                        $delete_product = "delete from cart where p_id='$remove_id' and ip_add='$ip_add'";

                        $run_delete_product = mysqli_query($con,$delete_product);

                        if($run_delete_product){

                            echo "<script>alert('Successfully delete your product.')</script>";

                            echo "<script>window.open('cart.php','_self')</script>";

                        }

                    }

                    ?>
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("footer.php");
    
    ?>
    
	<script src="layout/styles/jquery-331.min.js"></script>
	<script src="layout/styles/bootstrap-337.min.js"></script>

    
    
    
</body>
</html>