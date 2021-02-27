<?php 
    
    include("includes/check_login.php");

?> 

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Products
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover" style="text-align: center;"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="text-align: center;"> Product ID: </th>
                                <th style="text-align: center;"> Product Name: </th>
                                <th style="text-align: center;"> Product Image: </th>
                                <th style="text-align: center;"> Product Price: </th>
                                <th style="text-align: center;"> Product Quantity: </th>
                                <th style="text-align: center;"> Product Left: </th>
                                <th style="text-align: center;"> Product Sold: </th>
                                <th style="text-align: center;"> Product Date: </th>
                                <th style="text-align: center;"> Product Delete: </th>
                                <th style="text-align: center;"> Product Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from product";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];

                                    $pro_quantity = $row_pro['product_quantity'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                   
                                    $pro_date = $row_pro['date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                <td> RM <?php echo $pro_price; ?> </td>
                                <td> <?php echo $pro_quantity; ?>
                                <td><?php

                                        $get_sold = "select * from pending_order where product_id='$pro_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);

                                        $count = mysqli_num_rows($run_sold);

                                        echo $pro_quantity - $count;

                                        ?>
                                </td>
                                <td> <?php 
                                    
                                        $get_sold = "select * from pending_order where product_id='$pro_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                    
                                        $count = mysqli_num_rows($run_sold);
                                    
                                        echo $count;
                                    
                                     ?> 
                                </td>
                                <td> <?php echo $pro_date ?> </td>
                                <td> 
                                     
                                        <button type="submit" name="delete" value="Delete pro" class="btn btn-danger"><a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o" style="color: white;"></i> 
                                    
                                     </a></button>
                                     
                                </td>
                                <td> 
                                     
                                        <button type="submit" name="edit" value="Edit" class="btn btn-primary"><a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil" style="color: white;"></i>
                                    
                                     </a></button>
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->