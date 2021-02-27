<?php 
    
    include("includes/check_login.php");

?> 

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_user_id = $_GET['delete_user'];
        
        $delete_user = "delete from admin where admin_id='$delete_user_id'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Admin Profile Deleted')</script>";
            
            echo "<script>window.open('index.php?view_users','_self')</script>";
            
        }
        
    }

?>