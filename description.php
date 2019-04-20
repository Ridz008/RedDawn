<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    
    <title> Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>  
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .tag {display:inline;float:left;padding:2px 5px;width:auto;background:#F5A623;color:#fff;height:23px;}
        .tag-side{display:inline;float:left;}
        #books {border:1px solid #DEEAEE; margin-bottom:20px;padding-top:30px;padding-bottom:20px;background:#fff; margin-left:10%;margin-right:10%;}
        #description {border:1px solid #DEEAEE; margin-bottom:20px;padding:20px 50px;background:#fff;margin-left:10%;margin-right:10%;}
        #description hr{margin:auto;}
        #service{background:#fff;padding:20px 10px;width:112%;margin-left:-6%;margin-right:-6%;}
        .glyphicon {color:#D67B22;}
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
<body>
<div style="background-color:#2E2E2E ;margin-top:0px;margin-right:0px;padding:10px;">
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
<!-- banner -->
<!--Header over-->

    <?php
    include "dbconnect.php";
    $PID=$_GET['ID'];
    $query44="SELECT * from popular where pid='$PID' ";
    $que=mysqli_query($con,$query44);
    $numrows=mysqli_num_rows($que);
    if($numrows>0){
        
        while($row=mysqli_fetch_array($que)){ 
        $visit=$row['visit'];
        $visit=$visit+1;
        $query44="UPDATE popular set visit=$visit where pid='$PID'";
        mysqli_query($con,$query44);
        } 

    }   

    $query = "SELECT * FROM products WHERE PID='$PID'";
    $result = mysqli_query ($con,$query)or die(mysql_error());

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/".$row['PID'].".jpg";
            $target="cart.php?ID=".$PID."&";
echo '
  <div class="container-fluid" id="books">
    <div class="row">
      <div class="col-sm-10 col-md-6">
                          <div class="tag">'.$row["Discount"].'%OFF</div>
                              <div class="tag-side"><img src="img/orange-flag.png">
                          </div>
                         <img class="center-block img-responsive" src="'.$path.'" height="550px" style="padding:20px;">
      </div>
      <div class="col-sm-10 col-md-4 col-md-offset-1">
        <h2> '. $row["Title"] . '</h2>
                                <span style="color:#00B9F5;">
                                 #'.$row["Author"].'&nbsp &nbsp #'.$row["Publisher"].'
                                </span>
        <hr>            
                                <span style="font-weight:bold;"> Quantity : </span>';
                                echo'<select id="quantity">';
                                   for($i=1;$i<=$row['Available'];$i++)
                                       echo '<option value="'.$i.'">'.$i.'</option>';
                               echo ' </select>';


                               echo'                           <br><br><br>';
                             
                             
                               if(isset($_SESSION['seller'])){
                                    echo'   <a  href="" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                  ADD TO CART for Rs '.$row["Price"] .' <br>
                                  <span style="text-decoration:line-through;"> RS'.$row["MRP"].'</span> 
                                  | '.$row["Discount"].'% discount
                                  </a> <br><h4>You need to be logged in as a user <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to add books to cart</h4>';
                                   }
                              else if(isset($_SESSION['user'])){
                                echo'   <a id="buyLink" href="'.$target.'" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                ADD TO CART for Rs '.$row["Price"] .' <br>
                                <span style="text-decoration:line-through;"> RS'.$row["MRP"].'</span> 
                                | '.$row["Discount"].'% discount
                                </a> ';
                                   }
                               else{
                                echo'   <a  href="login.php?value=login" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                ADD TO CART for Rs '.$row["Price"] .' <br>
                                <span style="text-decoration:line-through;"> RS'.$row["MRP"].'</span> 
                                | '.$row["Discount"].'% discount
                             </a> ';
                                   }
                             

  echo'    </div>
    </div>
          </div>
     ';
echo '
          <div class="container-fluid" id="description">
    <div class="row">
      <h2> Description </h2> <br>
                        <p>'.$row['Description'] .'</p><br>
                        <pre style="background:inherit;border:none;">
   PRODUCT CODE  '.$row["PID"].'   <hr> 
   TITLE         '.$row["Title"].' <hr> 
   AUTHOR        '.$row["Author"].' <hr>
   AVAILABLE     '.$row["Available"].' <hr> 
   PUBLISHER     '.$row["Publisher"].' <hr> 
   EDITION       '.$row["Edition"].' <hr>
   LANGUAGE      '.$row["Language"].' <hr>
   PAGES         '.$row["page"].' <hr>
   WEIGHT        '.$row["weight"].' <hr>
                        </pre>
    </div>
  </div>
';

            
            }
        }
    echo '</div>';
    ?>



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
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:cayden53@gmail.com">cayden53@gmail.com</a></li>
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
                        <input type="text" name="email" ><a href="mailto:cayden53@gmail.com"></a></li>
            
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
        <h2><a href="index_logged.php">Red Dawn <span>Book Store</span></a></h2>
      </div>
    
    </div>
  </div>
<!-- //footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script>
            $(function () {
                var link = $('#buyLink').attr('href');
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                $('#quantity').on('change', function () {
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                });
            });
    </script>
</body>
</html>       
