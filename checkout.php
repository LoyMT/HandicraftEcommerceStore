<?php 

    $active='Account';
    include("header.php");

?>
   <script src="layout/styles/style.css"></script>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->                             
         	  </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 Begin -->
           
                <?php 
                
                if(!isset($_SESSION['customer_name'])){
                    
                    include("login.php");
                    
                }else{
                    
                    include("payment_option.php");
                    
                }
                
                ?>
           
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