<?php 

    $active='Account';
    include("header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
                      
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Register a new account </h2>
                           
                       </center><!-- center Finish -->
                       
                       <form action="register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Name</label>
                               
                               <input type="text" class="form-control" name="c_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Email</label>
                               
                               <input type="email" class="form-control" style="color:black;" name="c_email" placeholder="example@gmail.com" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Password</label>
                               
                               <input type="password" class="form-control" name="c_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" required>
                               
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Confirmed Password</label>
                               
                               <input type="password" class="form-control" name="cpassword" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Country</label>
                               
                               <input type="text" class="form-control" name="c_country" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>City</label>
                               
                               <input type="text" class="form-control" name="c_city" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Contact</label>
                               
                               <input type="tel" class="form-control" style="color:black;" name="c_contact" pattern="([0-9]{3}-[0-9]{7})" placeholder="01x-xxxxxxx" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Address</label>
                               
                               <input type="text" class="form-control" name="c_address" required>
                               
                           </div><!-- form-group Finish -->
                                             
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Register
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("footer.php");
    
    ?>
    
	<script src="layout.css"></script>
	<script src="layout/styles/jquery-331.min.js"></script>
	<script src="layout/styles/bootstrap-337.min.js"></script>
    
    
</body>
</html>


<?php 

if(isset($_POST['register'])){

    $c_name = $_POST['c_name'];

    if(isset($_POST['c_name'])){
        
        $get_customer = "select * from customer";
        
        $run_customer = mysqli_query($con, $get_customer);
        
        while($row_customer = mysqli_fetch_array($run_customer)){
            
            if($_POST['c_name'] == $row_customer['customer_name']){  
                
                echo "<script>alert('Username had been use')</script>";
                echo "<script>window.open('register.php','_self')</script>";
            
            }
            
        }
        
    }
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];

    $cpassword = $_POST['cpassword'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
        
    $c_ip = getRealIpUser();
        
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);

   if($c_pass != $cpassword){
       echo '<script>alert("The password are not match")</script>';
   }else{
       $c_name = mysqli_real_escape_string($con, $_POST["c_name"]);
       $c_pass = mysqli_real_escape_string($con, $_POST["c_pass"]);
       $c_pass = hash('sha256',$c_pass);
       $insert_customer = "insert into customer (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_ip')";
       if(mysqli_query($con, $insert_customer) AND $check_cart>0){
        
            $_SESSION['customer_name']=$c_name;
            
            echo "<script>alert('You have been Registered Successfully')</script>";
    
            echo "<script>window.open('checkout.php','_self')</script>";

       }else{

            $_SESSION['customer_name']=$c_name;
            
            echo "<script>alert('You have been Registered Successfully')</script>";
            
            echo "<script>window.open('checkout.php','_self')</script>";
       }
    }
	
}

?>