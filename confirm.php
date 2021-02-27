<?php 

$active="0";
include("db.php");
include("header.php");

if(!isset($_SESSION['customer_name'])){
    
    echo "<script>window.open('checkout.php','_self')</script>";
    
}else{
    
    if(isset($_GET['order_id'])){
    
        $orders_id = $_GET['order_id'];
    
    }

    $ref_no = mt_rand();

    $get_c_order = "select * from customer_order where order_id='$orders_id'";

    $run_c_orders = mysqli_query($con,$get_c_order);

    while($row_c_order=mysqli_fetch_array($run_c_orders)){

    $invoice_no = $row_c_order['invoice_no'];

    $amount = $row_c_order['due_amount'];

}

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
                       
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <h1 align="center"> Please confirm your payment</h1>
                   
                   
                   <p class='text-muted' align="center"><!-- text-muted Begin -->
                
                        We will only process your orders once payment is confirmed.
                                        
                    </p><!-- text-muted Finish -->

                   
                   <form action="confirm.php?update_id=<?php echo $orders_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Invoice No: </label>
                          
                          <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no; ?>" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Amount Sent: </label>
                          
                          <input type="text" class="form-control" name="amount" value="<?php echo $amount; ?>" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                          
                         <label> Select Payment Mode: </label>
                          
                          <select name="payment_mode" class="form-control" required><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Credit Card </option>
                              <option> Offline </option>
                              <option> Banking </option>
                              <option> Paypal </option>
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Transaction / Reference ID: </label>
                          
                          <input type="text" class="form-control" name="ref_no" value="<?php echo $ref_no; ?>" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Paypal Code: </label>
                          
                          <input type="text" class="form-control" name="code">
                           
                       </div><!-- form-group Finish -->
                        
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                   </form><!-- form Finish -->
                   
                   <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];

                        $amount = $_POST['amount'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payment (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code',NOW())";
                        
                        $run_payment = mysqli_query($con,$insert_payment);

                        $update_customer_order = "update customer_order set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_order set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('cust_orders.php','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("footer.php");
    
    ?>
    
	<script src="layout/scripts/jquery.min.js"></script> 
	<script src="layout/scripts/jquery.mobilemenu.js"></script>
    
    
</body>
</html>
<?php } ?>