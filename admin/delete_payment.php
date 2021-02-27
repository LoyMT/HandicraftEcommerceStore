<?php 
    
    include("includes/check_login.php");

?> 

<?php 

    if(isset($_GET['delete_payment'])){
        
        $delete_payment_id = $_GET['delete_payment'];
        
        $delete_payment = "delete from payment where payment_id='$delete_payment_id'";
        
        $run_delete = mysqli_query($con,$delete_payment);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Payment Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_payments','_self')</script>";
            
        }
        
    }

?>