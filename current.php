<?php
	session_start();
?>

<?php  
            $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
            mysqli_select_db($con,'book_store') or die("cannot select DB");  
            $email=$_SESSION['email'];       // email fetch
            if(isset($_POST["update"])){  
                if(!empty($_POST['first_n']) && !empty($_POST['middle_n']) && !empty($_POST['last_n'])  && !empty($_POST['email']) && !empty($_POST['pass'])  ) {  
                    $email1=($_POST['email']);
                    $first=($_POST['first_n']);
                    $last=($_POST['last_n']);
                    $middle=($_POST['middle_n']);
                    $pass=($_POST['pass']);
                    $query1="update register set email='$email1'  , first_n='$first',  last_n='$last',
                     middle_n='$middle'  WHERE email='$email' and pass='$pass' ";
                    if(mysqli_query($con,$query1)){
                     
                        session_start();  
                        $_SESSION['user']=$first;
                        $_SESSION['middle']=$middle;
                        $_SESSION['last']=$last;
                        $_SESSION['email']=$email;
                        
                        // $userdata=array("email"=>"$dbusername");
                        header("Location: Index_logged.php");  
                    }else{
                        echo '<script type="text/javascript">alert("Enter Correct Password to update details!");window.location("current.php?value=changepass");</script> ';
                    }
                    
                } 
                else {  
                    echo "Enter All Feilds!";  
                }  
            }
            elseif(isset($_POST['updatepass'])){
                if(!empty($_POST['pass']) && !empty($_POST['newpass']))  {  
                   
                    $query1="SELECT * FROM register WHERE email='$email'";
                    $query=mysqli_query($con,$query1);
                    $numrows=mysqli_num_rows($query);
                   
                    if($numrows>0){
                        $row=mysqli_fetch_array($query);
                        $pass=$row['pass'];
                        $newpass=($_POST['newpass']);
                        $pass1=($_POST['pass']);
                        if($pass!=$pass1){
                            echo '<script type="text/javascript">alert("Current Password wrong!");window.location("current.php?value=changepass");</script> ';
                        }
                        else{
                            $query2="update register set pass='$newpass' WHERE email='$email' and pass='$pass' ";
                            $query3=mysqli_query($con,$query2);
                            header("Location: Index_logged.php");  
                        }
                        
                        }
                } 
                else {  
                    echo '<script type="text/javascript">alert("Enter Password!!!");window.location("current.php?value=changepass")</script> '; 
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
<!--body-->
        <div class="header">
        <div class="container">    
         <div class="login">
               <div class="container">
                    <h3 class="animated zoomIn" data-wow-delay=".2s" align="middle">Your Account</h3>
                    <?php
                        if(isset($_GET['value'])){
                            $changpass=$_GET['value'];
                            if($changpass=="changepass"){
                                echo '<p class="est animated zoomIn" data-wow-delay=".2s">Update Password</p>
                                <div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                                    <form action="#" enctype="multipart/form-data" method="POST">';
                                
                                    echo '
                                    <input type="email" name="email" value="'.$_SESSION['email'].'"
                                    required=" "  readonly>
                                    <input type="password" name="pass" placeholder="Enter Current Password " 
                                    required=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                    title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >
                                    <input type="password" name="newpass" placeholder="Enter New Password " 
                                    required=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                    title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >';
                                    
                                   echo' <div class="forgot">
                                        <a href="forgotpass.php">Forgot Password?</a>
                                    </div>
                                    <button type="submit"  name="updatepass">Update</button>
                                </form>
                            </div>';
                            }
                            elseif($changpass=="change"){
                                        
                                echo '<p class="est animated zoomIn" data-wow-delay=".2s">Please Edit Information to be updated</p>
                                <div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                                    <form action="#" enctype="multipart/form-data" method="POST">';
                                       
                                        echo '
                                        <input type="text" placeholder="First Name" required name="first_n" value="'.$_SESSION['user'].'" ><br>
                                        <input type="text" placeholder="Last Name" required name="middle_n"  value="'.$_SESSION['middle'].'"><br>
                                        <input type="text" placeholder="Middle Name"  name="last_n" value="'.$_SESSION['last'].'">&nbsp;<br>
                                        <input type="text" placeholder="Mobile Number" readonly  name="mobile" value="'.$_SESSION['mobile'].'">&nbsp;<br>
                                        <input type="email" name="email" value="'.$_SESSION['email'].'"
                                        required=" " pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9_]+\.[a-z.]{2,}$" 
                                        title="Please enter valid Email address" readonly>
                                        <input type="password" name="pass" placeholder="Enter Password to update details" 
                                        required=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                        title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >';
                                        
                                       echo' <div class="forgot">
                                            <a href="forgotpass.php">Forgot Password?</a>
                                        </div>
                                        <button type="submit"  name="update">Update</button>
                                    </form>
                                </div>';
                            }
                        }
                        if(isset($_SESSION['seller'])){
                            $sel1=$_SESSION['seller'];
                            if($sel1=='seller'){
                            echo '<div>
                            <center><h1>Click below to add New Book</h1></center>
                            <center><h2><a href="add_book.php">Add Book</a></h2></center>
                            </div>';}
                        }
                    ?>

                   
                </div>
            </div> 
    </div>  
    </div>
    </body>
</html>