<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #books {margin-bottom: 50px;}
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        #books .row{margin-top:30px;margin-bottom:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
   </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/rd.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/animate.min.css" rel="stylesheet"> 
        <script src="js/jquery.min.js"></script>

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


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

<!--Header over-->
<div class="container">
  
    <?php
    include "dbconnect.php";
        if(isset($_GET['value']))
        {  
           $_SESSION['author']=$_GET['value'];
        }
    $author=$_SESSION['author'];
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="price")
                {   $query = "SELECT * FROM products WHERE Author='$author' ORDER BY Price";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="priceh")
                {   $query = "SELECT * FROM products WHERE Author='$author' ORDER BY Price DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discount")
                {   $query = "SELECT * FROM products WHERE Author='$author' ORDER BY Discount DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discountl")
                {   $query = "SELECT * FROM products WHERE Author='$author' ORDER BY Discount";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="titleh")
                {   $query = "SELECT * FROM products WHERE Author='$author' ORDER BY title";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
    } 
    else   
                  $query = "SELECT * FROM products WHERE Author='$author'";
                  $result = mysqli_query ($con,$query)or die(mysql_error());
    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:#D67B22;text-transform:uppercase;margin-bottom:0px;"> '. $author .' STORE </h2>
           </div>
        </div>      
        <div class="container fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Sort by &nbsp: &nbsp</label>
                            <select name="sort" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected">Select</option>
                                <option value="price" name="price">Low To High Price </option>
                                <option value="priceh" name="priceh">Highest To Lowest Price </option>
                                <option value="titleh" name="priceh">Sort by Book Title </option>
                                <option value="discountl" name="discountl">Low To High Discount </option>
                                <option value="discount" name="discount">Highest To Lowest Discount</option>
                            </select>
                       </form>
                  </div>
              </div>
        </div>';

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/" .$row['PID'].".jpg";
            $description="description.php?ID=".$row["PID"];
            if($i%4==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] .'  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] .' </span>
                        <span class="label label-warning">'. $row["Discount"] .'%</span>
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%4==0)
            echo '</div>';
            }
        }
    echo '</div>';
    ?>

</div>
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
</body>
</html>		