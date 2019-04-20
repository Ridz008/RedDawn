<?php         
                  $host = "localhost";
                  $dbUsername = "root";
                  $dbPassword = "";
                  $dbname = "book_store";
                if(isset($_POST["submit"])){
                    print '<script type="text/javascript"> alert("Password sent");</script>';
                $user=($_POST['email']);   
                $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
                 
                $query1="SELECT first_n,last_n,middle_n,pass,email FROM register WHERE email='$user'";
                $query=mysqli_query($conn,$query1);# or die(mysqli_error());  
                $numrows=mysqli_num_rows($query);
                $dbusername;
                $dbpassword;
                $dbfirst;
                $dbmiddle;
                $dblast;  
                if($numrows>0){  
                    print '<script type="text/javascript"> alert("Phhhhht");</script>';
                    while($row=mysqli_fetch_array($query)){  
                        $dbusername=$row['email']; 
                        $dbfirst=$row['first_n'];
                        $dbmiddle=$row['middle_n'];
                        $dblast=$row['last_n'];  
                        $dbpassword=$row['pass'];
                        
                    }  
                    
                    if($user == $dbusername){   
                        header("Location: login.php"); 
                        print '<script type="text/javascript"> alert("Inside");</script>';
                        $to=$_POST['email'];
                        $t='ridhamdudhat@gmail.com';
                        $subject = 'Password';
                        $message = "Welcome to Reddawn Bookstore\nDear $dbfirst $dbmiddle $dblast,\n
                        Your Password is $dbpassword.\n";
                        $headers='From: Reddawn';
                        if(mail($to,$subject,$message,$headers))
                            print '<script type="text/javascript"> alert("Password sent");</script>';
                        else
                            print '<script type="text/javascript">alert("Wrong E-mail ID!!!");</script> '; 
                    }else
                    print '<script type="text/javascript">alert("Wrong E-mail ID user not found!!!");</script> '; 
                } 
                else {
                    print '
                    <script type="text/javascript">alert("Wrong E-mail ID d!!!");</script> ';
                    
                } 
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
                                               <li style=""><a href="current.php?value=changepass">Change Password</a></li>';
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
        
        <div class="header">
        <div class="container">    
         <div class="login">
               <div class="container">
                    <h3 class="animated zoomIn" data-wow-delay=".2s" align="middle">Login Form</h3>
                        <p class="est animated zoomIn" data-wow-delay=".2s">Please Enter Your Login Information</p>
                            <div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                                <form action="#" enctype="multipart/form-data" method="POST">
                                    <input type="email" name="email" placeholder="Email Address" required=" " pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9_]+\.[a-z]{2,3}$" title="Please enter valid Email address" >
                                    
                                    <button type="submit"  name="submit">Get Password</button>
                                </form>
                            </div>
                    <h4 class="animated slideInUp" data-wow-delay=".2s" align="middle">If not registered</h4>
                    <p class="animated slideInUp" data-wow-delay=".2s" align="middle"><a href="register.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
                </div>
            </div> 
    </div>  
    </div>
    </body>
</html>