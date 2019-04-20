<?php
	session_start();
  if(isset($_SESSION['user'])){
       header("location: index_logged.php?Message=Login To Continue");
    echo '<script type="text/javascript">
        alert("Please Login view your cart!")
    </script>';
    }

?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>
            Online Book store
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/animate.min.css" rel="stylesheet"> 
        
        
        <script src="js/jquery.min.js"></script>

        <script src="js/simpleCart.min.js"></script>
        <!-- for bootstrap working -->
        <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
        
    </head>
    <style>
  
    </style>

    <body >
        
<div class="header">
            <div class="container">
                    <div class="header-grid"  >
                                    <div class="header-grid-left animated slideInLeft" data-wow-delay=".2s" >
                                            <ul>
                                                <li><i class="glyphicon glyphicon-envelope" style="color:black" aria-hidden="true"></i><a href="mailto:cayden53@gmail.com" ">csreddawn@gmail.com</a></li>
                                                <li><i class="glyphicon glyphicon-earphone" style="color:black"   aria-hidden="true"></i><a style="color:black">+91 <span>7990</span> 662<span> 972</span></a></li>
                                                <?php
                                             if(isset($_SESSION['user'])){
                                              
                                                echo  ' <li class="dropdown"><i class="glyphicon  glyphicon-log-in" style="color:black" aria-hidden="true"></i>
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome '.$_SESSION['user'].' <b class="caret"></b></a>';
                                                echo '<ul class="dropdown-menu columns">
                                                <li><a href="current.php">Your Account</a></li>
                                                <li><a href="cart.php">Your Cart</a></li>
                                                <li><a href="logout.php">Log out</a></li>
                                                </ul>
                                                </li>
                                                '; 
                                                 
 
                                                echo '<li><i class="glyphicon glyphicon-log-in" style="color:black" aria-hidden="true"></i><a href="logout.php">Log out</a></li>';
                                             }else{
                                            echo '<li><i class="glyphicon glyphicon-log-in" style="color:black" aria-hidden="true"></i><a href="login.php">Login</a></li>';
                                            echo '<li><i class="glyphicon glyphicon-log-in" style="color:black" aria-hidden="true"></i><a  href="Register.php">Register</a></li>';
                                            }
                                            ?> 
                                            </ul>
                                    </div>
                                    <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                                            <ul class="social-icons">
                                                
                                                <?php 
                                                    if(isset($_SESSION['user'])){
                                                       
                                                            echo' <li><i><a  href="cart.php">
                                                                 <img src="images/cart.png" height="25px" width="50px">Cart</a></i></li>';
                                                    
                                                    }
                                                    ?>
                                            </ul>
                                    </div>
                    </div>
        
                    <div class="logo-nav" >
                            <div class="logo-nav-left animated zoomIn" data-wow-delay="0.2s">
                                <h1><a href="Index_logged.php">Red dawn<span style="font-size:14px;color:red">Book    Store</span></a></h1>
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
      
<!--body-->
        
<div class="login">
           <div class="container">
            <h3 class="animated zoomIn" data-wow-delay=".2s" >Register</h3>
          	<p class="est animated zoomIn" data-wow-delay=".2s">Please fill up the form</p>
			<div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                <form action="welcome.php" enctype="multipart/form-data" method="POST">
                    
                    <input type="text" placeholder="First Name" required name="first_n" >
                    <input type="text" placeholder="Last Name" required name="last_n" >
                    <input type="text" placeholder="Middle Name"  name="middle_n" ><br>
                    <input type="email" placeholder="Email Address" 
                    required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9_]+\.[a-z.]{2,}$" title="Please enter valid Email address" name="email">
					
                    <input type="password" placeholder="Password" required name="pass" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >
					
					<button  type="submit" value="register" align="middle" name="action">Register</button>
                </form>
                <h4 class="animated slideInUp" data-wow-delay=".2s" align="middle">If already registered</h4>
			<p class="animated slideInUp" data-wow-delay=".2s" align="middle"><a href="login.php">Login Here</a> (Or) go back to <a href="index_logged.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
            
            </div>
             </div>
        </div>
        
    </body>
</html>

