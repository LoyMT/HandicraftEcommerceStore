<?php 

$active="0";
include("header.php");
if(!isset($_SESSION['customer_name'])){
    
    echo "<script>window.open('checkout.php','_self')</script>";
    
}

?>


<center><!--  center Begin  -->
    
    <br><br>
    <h1> My Orders </h1>
        
</center><!--  center Finish  -->


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $customer_session = $_SESSION['customer_name'];
            
            $get_customer = "select * from customer where customer_name='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_order where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];

                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> RM<?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                        <a href="confirm.php?order_id=<?php if($order_status == 'Paid') echo '#' ; else echo $order_id; ?>" target="_blank" class="<?php if($order_status == 'Paid') echo 'btn btn-default disabled'; else echo 'btn btn-primary btn-sm' ?>">
                            <?php 

                            if($order_status == 'Unpaid'){

                                echo '

                                 Confirm Paid 

                                ';

                            }else{

                                echo '

                                 Paided

                                ';

                            }

                            ?>
                        </a>
                    
                </td>
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->

<?php 

    include("footer.php");

?>
	<script src="layout.css"></script>
	<script src="layout/styles/jquery-331.min.js"></script>
	<script src="layout/styles/bootstrap-337.min.js"></script>
	
</body>
</html>