<!--4000056655665556-->
<?php
	session_start();
  if(!isset($_SESSION['user'])){
       header("location: index_logged.php?value=login?Message=Login To Continue");
    echo '<script type="text/javascript">
        alert("Please Login view your cart!")
    </script>';
    }
    if(isset($_SESSION['seller'])){
      echo '<script>alert("Please login as a User to buy books");
            window.location.href="login.php?value=login";</script>';
    }
    
	include "dbconnect.php";
         $customer=$_SESSION['email'];
?>
<?php

        if(isset($_GET['place']))
                 {  
                    // $queryret="SELECT * FROM custorder where customer='$customer'";
                    // $queryre=mysqli_query($con,$queryret);
                    // $numrows=mysqli_num_rows($queryre);
                    // $prod="";
                    
                    // if($numrows>0){
                        
                    //     while($row=mysqli_fetch_array($queryre)){  
                    //         //$quantity=$row['quantity'];  
                    //         $prod=$prod.'|'.$row['product'];
                    //     }
                    // }
                    $query4="SELECT * FROM cart where Customer='$customer'";
                    $query4ret=mysqli_query($con,$query4);
                    $numrows=mysqli_num_rows($query4ret);
                    if($numrows>0){
                        
                        while($row=mysqli_fetch_array($query4ret)){  

                            $qua=$row['Quantity'];  
                            // $temp=$row['Product'];
                            // while($qua>=1){
                            $pro=$row['Product'];
                            $query44="INSERT Into custorder (customer,product,quantity) values('$customer','$pro',$qua)";

                            mysqli_query($con,$query44);
                            
    
                                //  $prod=$prod.'|'.$temp;
                                //  $qua=$qua-1;
                            // }                            
                        }

                    // for($i=0;$i<$quantity;$i++){ 
                    }
                    // $finalpro=$product + "|" +$pro;
                    //$query2="UPDATE custorder set product='$prod' where customer='$customer' ";

                    //------------------------------------------------------------------------
                    $query="DELETE FROM cart where Customer='$customer'";
                    $result=mysqli_query($con,$query);
                    //$result=mysqli_query($con,$query2);
                ?>
                <!-- <script type="text/javascript">
                         alert("Order SuccessFully Placed!! Kindly Keep the cash Ready. It will be collected on Delivery");
                </script> -->
            <?php
                }
            ?>
                <?php
                if(isset($_GET['remove']))
                         {  $product=$_GET['remove'];
                            
                            $query="DELETE FROM cart where Customer='$customer' AND Product='$product'";
                            $result=mysqli_query($con,$query);
                          } 
                 ?>
                    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>order</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid rgb(15, 11, 6);padding-left:0px;padding-right:0px;}
        .panel-heading {background:rgb(7, 6, 5) !important;color:white !important;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
    </style>
 <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/rd.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/animate.min.css" rel="stylesheet"> 
        <!-- <link href="css/my.css" rel="stylesheet">  -->
        <script src="js/jquery.min.js"></script>

<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->

<script>
 new WOW().init();
</script>
</head>
<body>  <div style="background-color:#2E2E2E ;margin-top:0px;margin-right:0px;padding:10px;">
            <div   style="margin-left:7%;margin-right:9%;margin-top:0px;margin-right:9%;padding-top:0px;">
                    <div class="header-grid" style="padding-top:4px;"  >
                                    <div class="header-grid-left animated slideInLeft;z-index:2"; data-wow-delay=".2s" >
                                            <ul>
                                                <li><i class="glyphicon glyphicon-envelope" style="color:white" aria-hidden="true"></i><a href="mailto:cayden53@gmail.com" ">csreddawn@gmail.com</a></li>
                                                <li><i class="glyphicon glyphicon-earphone" style="color:white"   aria-hidden="true"></i><a style="color:white">+91 <span>7990</span> 662<span> 972</span></a></li>
                                               
                                                <?php
                                              if(isset($_SESSION['user'])){
                                              
                                               echo  ' <li class="dropdown"><i class="glyphicon  glyphicon-log-in" style="color:white" aria-hidden="true"></i>
                                               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome '.$_SESSION['user'].' <b class="caret"></b></a>';
                                               echo '<ul class="dropdown-menu columns" style="">
                                               <li style=""><a href="current.php?value=change">Your Account</a></li>
                                               <li style=""><a href="current.php?value=changepass">Change Password</a></li>
                                               <li style=""><a href="order.php">Your Orders</a></li>';
                                               if(!isset($_SESSION['seller'])){
                                                echo '<li style=""><a href="cart.php">Your Cart</a></li>'; 
                                               }
                                               if(isset($_SESSION['seller'])){
                                                echo'<li ><a href="add_book.php">Add Book</a></li>';
                                                
                                                }
                                                echo '<li ><a href="logout.php">Log Out</a></li>
                                                </ul>';                                                 
                                               echo '<li><i class="glyphicon glyphicon-log-in" style="color:white" aria-hidden="true"></i><a href="logout.php">Log out</a></li>';
                                            }else{
                                            echo '<li><i class="glyphicon glyphicon-log-in" style="color:white" aria-hidden="true"></i><a href="login.php?value=login">Login</a></li>';
                                            echo '<li><i class="glyphicon glyphicon-log-in" style="color:white" aria-hidden="true"></i><a  href="login.php?value=register">Register</a></li>';
                                            }
                                            ?> 
                                            </ul>
                                    </div>
                                    <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                                            <ul class="social-icons">
                                                
                                                <?php 
                                                    if(isset($_SESSION['user'])&&!isset($_SESSION['seller'])){
                                                       
                                                            echo' <li><i><a  href="cart.php">
                                                                 <img src="images/cart.png" height="32px" width="30px">Cart</a></i></li>';
                                                    
                                                    }
                                                    else if(isset($_SESSION['seller'])){
                                                        echo ' <li><a  href="add_book.php">
                                                                 Add Book</a></li>';
                                                    }
                                                    ?>
                                            </ul>
                                    </div>
                    </div>
           
            </div>
</div>

<!--body-->

<div style="position:sticky;top:0;z-index:99;background-color:#2E2E2E ;padding-top:0 ;margin-top:0">
<div style="margin-left:12.5%;margin-right:9%;background-position:fixed;margin-top:0px">
                    <div class="logo-nav" >
                            <div class="logo-nav-left animated zoomIn" data-wow-delay="0.2s">
                                <h1><a href="Index_logged.php">Red dawn<span style="font-size:14px;color:white">Book    Store</span></a></h1>
                            </div>
                             
                                <div  style="padding-top:20px;margin-left:22%;margin-right:100px;margin-top:0px;margin-bottom:0px   ">
                                    <form role="search" method="POST" action="Result.php">
                                            <input type="text" class="form-control" name="keyword" style="width:100%;margin-left:30px" placeholder="Search for a Book , Author Or Category">
                                    </form>

                                </div>
                                   
                    </div>
                <div class="clearfix"> </div>
                
            </div>
</div>

<!--Header over---------------------------------------------------------------------------->
	<?php

echo '<div class="container-fluid" id="cart">
      <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:white;text-transform:uppercase;background-color:black;margin-left:41%;
                 margin-right:40%;padding:20px;border-radius:40%">  YOUR CART </h2><hr><br><br>
           </div>
        </div>';
	if(isset($_SESSION['user']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                        $product=$_GET['ID'];
                        $quantity=$_GET['quantity'];
                        $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
                        $result=mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { $query="INSERT INTO cart values('$customer','$product','$quantity')"; 
                              $result=mysqli_query($con,$query);
                            }
                        else
                           { $new=$_GET['quantity'];
                             $query="UPDATE `cart` SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
	                           $result=mysqli_query($con,$query);
                            }
                    }
              	$query="SELECT PID,Title,Author,Edition,Quantity,Price FROM cart INNER JOIN products ON cart.Product=products.PID 
              	        WHERE Customer='$customer'";
	        $result=mysqli_query($con,$query); 
                $total=0;
                if(mysqli_num_rows($result)>0)
                {    $i=1;
                     $j=0;
                     while($row = mysqli_fetch_assoc($result))
                     {       $path = "img/books/".$row['PID'].".jpg";
                             $Stotal = $row['Quantity'] * $row['Price'];
                             if($i % 2 == 1)  $offset= 1;
                             if($i % 2 == 0)  $offset= 2;                                                
                             if($j%2==0)
                                 echo '<div class="row">'; 
                                 echo '                
                                      <div class="panel col-xs-12 col-sm-4 col-sm-offset-'.$offset.' col-md-4 col-md-offset-'.$offset.' col-lg-4 col-lg-offset-'.$offset.' text-center" style="color:black;font-weight:800;">
                                          <div class="panel-heading">Order '. $i .'
                                          </div>
                                          <div class="panel-body">
			                                                <img class="image-responsive block-center" src="'.$path.'" style="height :100px;"> <br>
           							                                                    Title : '.$row['Title'].'  <br>        	 
                                                      									Author : '.$row['Author'].' <br>                            	      
                                                      									Edition : '.$row['Edition'].' <br>
                                                      									Quantity : '.$row['Quantity'].' <br>
                                                      									Price : '.$row['Price'].' <br>
                                                      									Sub Total : '.$Stotal.' <br><br>
                                                                       <a href="cart.php?remove='.$row['PID'].'" class="btn btn-sm" 
                                                                          style="background:black;color:white;font-weight:800;">
                                                                          Remove
                                                                        </a>
                                        </div>
                                    </div>';
                               if($j % 2==1)
                                   echo '</div>';                                 
                               $total=$total + $Stotal; 
                               $total1=$total/71*100;
                               $i++;
                               $j++;                                                 
                     } 
                    
                    echo '<div class="container">
                              <div class="row">  
                                 <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:black;font-weight:1000;">
                                     <div class="panel-heading">TOTAL
                                     </div>
                                      <div class="panel-body">'.$total.'
                                     </div>
                                 </div>
                               </div>
                          </div>
                         ';
                     echo '<br> <br>';
                
                        //    <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-1 col-lg-4 ">
                        //           <a href="cart.php?place=true" class="btn btn-lg" style="background:black;color:white;font-weight:800;margin-top:5px;">Place Order</a>
                        //      </div>
                        //    </div>
                        //    echo '<div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/523C01F7F8E51D990949D15DA6F224BC">
                        //    <img src="https://www.payumoney.com/media/images/payby_payumoney/new_buttons/22.png" /></a></div> ';
                    echo '
                    <div style="margin-left:40%;margin-right:40%;margin-top:-30px">
                    <form action="cart.php?place=true" method="POST">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_12mjL6plChi1rrBj1JRW9Q6x"
                        data-amount="'.$total1.'"
                        data-name="Stripe.com"
                        data-description="Example charge"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="true">
                    </script>
                    </form></div>
                    ';
                    echo '<div class="row">
                    <div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                         <a href="index_logged.php" class="btn btn-lg" style="margin-left:62%;margin-top:10px;background:black;color:white;font-weight:800;">Continue Shopping</a>
                     </div>  </div>                         
                  ';
                } 
               else
                     {  
                        echo ' 
                         <div class="row">
                            <div class="col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5">
                                 <h3><span class="text-center" style="color:black;font-weight:bold;margin-left:46px">Cart Is Empty</span></h3><br>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-xs-9 col-xs-offset-3 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                                  <a href="index_logged.php" class="btn btn-lg" style="background:black;color:white;font-weight:800;">&nbspReturn to Bookstore</a>
                                  
                             </div>
                          </div>';
                     }               
	    }
	else
	    { 
	          echo "login to continue";
	    }
        echo '</div>';
	?>
</div>
<!-- Footer-->
<div class="footer">
    <div class="container">
      <div class="footer-grids">
        <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
          <h3>About Us</h3>
          <p>We provide variety of books<span>A Platform to buy and sell books</span></p>
        </div>
        <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
          <h3>Contact Info</h3>
          <ul>
            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>N Block, Nirma University <span>Ahmedabad.</span></li>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:csreddawn@gmail.com">csreddawn@gmail.com</a></li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+7990 662 972</li>
          </ul>
        </div>
        <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                        <h3>Offer Zone</h3>
                        <ul>
                            <li>15% Off On FIrst Purchase</li>
                            <li>Payment accepted via all kind of platform</li>
                            <li>Go to Offer Page</li>
                        </ul>
                </div>    
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
          <h3>Subscription to our NewsLetter</h3>
          <ul>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                        <input type="text" name="email" ><a href="mailto:csreddawn@gmail.com"></a></li>
            
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
        <h2><a href="index_logged.php">Red Dawn <span>Book Store</span></a></h2>
      </div>
    
    </div>
<!-- //footer -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>