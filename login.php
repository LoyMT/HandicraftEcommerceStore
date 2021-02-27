<div id="content"><!-- #content Begin -->
     <div class="container"><!-- container Begin -->
		<div class="col-md-12"><!-- col-md-12 Begin -->

		<div class="box"><!-- box Begin -->
		    
		  <div class="box-header"><!-- box-header Begin -->
		      
		      <center><!-- center Begin -->
		          
		          <h1> Login </h1>
		          
		      </center><!-- center Finish -->
		      
		  </div><!-- box-header Finish -->
		   
		  <form method="post" action="checkout.php"><!-- form Begin -->
		      
		      <div class="form-group"><!-- form-group Begin -->
		          
		          <label> Username </label>
		          
		          <input name="c_name" type="text" class="form-control" required>
		          
		      </div><!-- form-group Finish -->
		      
		       <div class="form-group"><!-- form-group Begin -->
		          
		          <label> Password </label>
		          
		          <input name="c_pass" type="password" class="form-control" required>
		          
		      </div><!-- form-group Finish -->
		      
		      <div class="text-center"><!-- text-center Begin -->
		          
		          <button name="login" value="Login" class="btn btn-primary" style="width: 20%">
		              
		              <i class="fa fa-sign-in"></i> Login
		              
		          </button>
		          
		      </div><!-- text-center Finish -->   
		      
		  </form><!-- form Finish -->
		   
		  <center><!-- center Begin -->
		      
		     <a href="register.php">
		         
		         <h3> &nbsp;</h3>
		  <h3>First-time user please register here!</h3>
		         
		     </a> 
		      
		  </center><!-- center Finish -->
		    
		</div><!-- box Finish -->
           </div><!-- col-md-12 Finish --> 
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
		
<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
if(isset($_POST['login'])){
    
    $customer_name = $_POST['c_name'];
    
    $customer_pass = hash('sha256',$_POST['c_pass']);
    
    $select_customer = "select * from customer where customer_name='$customer_name' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
	
	
    $admin_name = mysqli_real_escape_string($con,$_POST['c_name']);
        
	$admin_pass = mysqli_real_escape_string($con,hash('sha256',$_POST['c_pass']));
	
	$get_admin = "select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";

	$run_admin = mysqli_query($con,$get_admin);
	
    $count = mysqli_num_rows($run_admin);
		
    if($check_customer==0 && $count==0){
        
        echo "<script>alert('Username or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_name']=$customer_name;
        
       echo "<script>alert('Logged In')</script>"; 
        
       echo "<script>window.open('cust_orders.php?my_orders','_self')</script>";
        
    }
	if($check_customer==1 AND $check_cart>0){
        
        $_SESSION['customer_name']=$customer_name;
        
       echo "<script>alert('Logged In')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
        
	if($count==1){
		
		$_SESSION['admin_name']=$admin_name;
		
		echo "<script>alert('Admin Logged In, Redirect to Admin Panel...')</script>";
		
		echo "<script>window.open('admin/index.php?dashboard','_self')</script>";
		
	}
        
    
}
 
}

?>
	<script src="layout.css"></script>
	<script src="layout/styles/jquery-331.min.js"></script>
	<script src="layout/styles/bootstrap-337.min.js"></script>
	
</body>
</html>