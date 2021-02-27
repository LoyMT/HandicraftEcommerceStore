<div class="container"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['customer_name'];
    
    $select_customer = "select * from customer where customer_name='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
                                   
    $total = 0;

    $ip_add = getRealIpUser();
                       
    $select_cart = "select * from cart where ip_add='$ip_add'";
                                   
    $run_cart = mysqli_query($con,$select_cart);
                                   
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

        $_SESSION['pro_qty'] = $pro_qty;
                                           
        $total += $sub_total;
    } 
    }
    
    if(isset($_POST["pay"])){
    //    echo "<script>window.location.href = 'order.php?c_id= $customer_id'</script>";
    }

    ?>

    <h1>Payment</h1>
    <div class="row"><!-- row 2 begin -->
    <div class="col-md-7"><!-- col-lg-12 begin -->
        <div class="box">
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading" style="text-align: center;"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Payment Options
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body" style="color: #D1234F;background-color:#FBFBFB;"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="col-md-12" ><!-- col-md-6 begin -->
                        <br>                        
                        
                        <div class="form-group"><!-- form-group begin -->  
                          <center>  
                            <input name="opt" type="radio" value="a">
                            <label>&nbsp Credit Card </label><br><br>
                          </center>          
                         </div>
                          
                
                        <div class="form-group"><!-- form-group begin -->  
                            <center>
                            <input name="opt" type="radio" value="b">
                            <label >&nbsp Offline Payment</label><br><br>
                            </center>
                        </div>

                        <div class="form-group" ><!-- form-group begin -->
                            <center>
                            <input name="opt" type="radio" value="c">
                            <label>&nbsp Online Payment</label><br><br>
                            
                            </center>
                        </div>

                        <div class="form-group" ><!-- form-group begin -->
                            <center>
                            <input name="opt" type="radio" value="d">
                            <label>&nbsp Paypal Payment</label><br><br>
                            </center>
                        </div><!-- form-group finish -->
                    
                    </div><!-- col-md-6 finish -->

                      <div class="form-group" style="float: right;"><!-- form-group begin -->
                      
                        <div class="col-md-6"><!-- col-md-6 begin -->
                       
                            <button type="submit" value="post" name="submit" class="btn btn-primary"> Confirm </button>
                        
                        </div><!-- col-md-6 finish -->
                   
                    </div><!-- form-group finish -->
                </form>
   
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->
<!-- box finish -->

<div class="col-md-4"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary:</h3>
                       
                   </div><!-- box-header Finish -->

                   <p><!-- text-muted Begin -->
                
                        Shipping and additional costs are calculated based on value you have entered
                
                    </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr style="background-color:#FBFBFB;"><!-- tr Begin -->
                               
                                   <td> Sub-Total </td>
                                   <th style="color: #999999;background-color:#FBFBFB;"> RM<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->

                               <tr><!-- tr Begin -->
                            
                                <td> Shipping and Handling </td>
                                <td> RM 0 </td>
                            
                                </tr><!-- tr Finish -->
                               
                               <tr class="total" style="background-color:#ffffcc;"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th style="background-color:#ffffcc;"> RM<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->
           
</div>

<?php
            if(isset($_POST['opt'])){
                $opt=$_POST['opt'];
            }
            $card_numErr=$cvvErr=$dateErr="";   //error message
            $card_num=$cvv=$date="";    //store data
            $success="";
            if(isset($_POST['card_num'])){  //if empty, get error message
                if(empty($_POST['card_num'])){
                    $card_numErr="Card&nbsp;Number&nbsp;is&nbsp;requied";
                }
                else{
                    $card_num=test_input($_POST['card_num']);
                }
                
                if(empty($_POST['cvv'])){
                    $cvvErr="CVV is requied";
                }
                else{
                    $cvv=test_input($_POST['cvv']);
                }
                
                if(empty($_POST['date'])){
                    $dateErr="Expire date is requied";
                }
                else{
                    $date=test_input($_POST['date']);
                }
                if((empty($card_numErr))&&(empty($cvvErr))&&(empty($dateErr))){ //if no error, get success message
                    $success="Payment Done Successful";
                }
            }
            function test_input($data) {    //check input data
                $data = trim($data);    //remove space left and right
                $data = stripslashes($data);    //remove slash 
                $data = htmlspecialchars($data);    //convert special char html to normal
                return $data;
            }
        ?>

<?php

if (isset($_POST['opt'])){
    echo "<hr>";
    $opt=$_POST['opt'];

    if($opt == 'a'){
        if(!empty($success)){
            echo "<script>window.location.href = 'order.php?c_id= $customer_id'</script>";
        }
        echo"<div class='col-md-10'>
                <div class='box'>
                    <form method='post' class='credit' enctype='multipart/form-data'>
                    <h3 style='font-size: 30px; font-weight: 1000;'>Credit Card</h3><span class='error' style='color: red;'> * required field</span><br><br>
                    <div class='well'>
                    <div class='form'>
                    <div class='card space icon-relative'>
                    <label style='color: black;'> Credit Card Number : </label>  
                    <input type='text' name='card_num' pattern='[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}' maxlength='19' style='width: 200px;' placeholder='xxxx-xxxx-xxxx-xxxx' class='form-control' required='required'>
                    <span class='error'> *$card_numErr</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class='card-item icon-relative'>
                    <label style='color: black;'> CVV : </label>  
                    <input type='text' name='cvv' pattern='[0-9]{3}' maxlength='3' style='width:60px;' placeholder='xxx' class='form-control' required>
                    <span class='error'> *$cvvErr</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</div>
                    <div class='card-item icon-relative'>
                    <label style='color: black;'> Expire Date : </label>  
                    <input type='text' name='date' pattern='[0-9]{2}/[0-9]{2}' maxlength='5' style='width:120px;' placeholder='month/year' class='form-control' required>
                    <span class='error'> *$dateErr</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</div>
                    <div class='text-right'><!-- text-center Begin -->
                    <button type='submit' name='checkout' class='btn btn-danger'>Check Out</button>          
                    </div><!-- text-center Finish -->
                    <input type='hidden' name='opt' value='$opt'>
                    </div></div>
                    </form>
                </div></div>";
    }
    if($opt == 'b'){
        
        echo "<script>window.location.href = 'order.php?c_id= $customer_id'</script>";
    }
    if($opt == 'c'){

        echo "<a href='https://www.maybank2u.com.my/home/m2u/common/login.do' target='_blank' style='margin-left: 80px;'><img src='https://images.contentstack.io/v3/assets/bltcf46bbde1704bd18/blta9a73d80b287d530/5bdfa52dd9dcab710b33a8e9/mayb.png?auto=webp&width=280' alt='MayBank' style='width:150px; height:70px; border: 1px solid black; border-radius: 4px;'></a>"."&nbsp;&nbsp;";  //maybank
        echo "<a href='https://s.hongleongconnect.my/rib/app/fo/login' target='_blank'><img src='https://www.1300.com.my/wp-content/uploads/2014/11/Hong-Leong-Bank.png' alt='HongLeong' style='width:150px; height:70px; border: 1px solid black; border-radius: 4px;'></a>"."&nbsp;";
         //hong leong
        echo "<a href='https://www.pbebank.com/' target='_blank'><img src='https://cdn.loanstreet.com.my/banks/logos/000/000/033/original/Public_bank.png?1505725764' alt='PublicBank' style='width:150px; height:70px; border: 1px solid black; border-radius: 4px;'></a>"."&nbsp;&nbsp;";    //public bank
        echo "<a href='https://www.cimbclicks.com.my/' target='_blank'><img src='https://www.thesundaily.my/binrepository/386x160/0c0/0d0/none/11808/KJBK/cimb-logo_146804_20190124210753.jpg' alt='CIMB' style='width:150px; height:70px; border: 1px solid black; border-radius: 4px;'></a>"."&nbsp;&nbsp;";   //cimb
        echo "<a href='https://www.i-muamalat.com.my/rib/index.do' target='_blank'><img src='https://www.i-muamalat.com.my/rib/images/logo_i_muamalat.jpg' alt='imuamalat' style='width:150px; height:70px; border: 1px solid black; border-radius: 4px;'></a>"."&nbsp;&nbsp;";//i-muamalat
        echo "<br><br>";

    }
    if($opt == 'd'){
       
        echo "<a href='https://www.paypal.com/my/home' target='_blank'><img src='https://newsroom.mastercard.com/wp-content/uploads/2016/09/paypal-logo.png' style='width:150px; border: 1px solid black; border-radius: 4px; margin-left:390px;'></a>";
        echo "<br><br>";
    }
}
?>