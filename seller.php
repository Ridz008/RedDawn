<?php
	session_start();
  if(isset($_SESSION['user'])){
       header("location: index_logged.php?Message=Login To Continue");
    echo '<script type="text/javascript">
        alert("Please Login view your cart!")
    </script>';
    }

?>

<?php  
   
        if(isset($_POST["submit"])){  
            if(!empty($_POST['email']) && !empty($_POST['pass'])) {  
                $user=($_POST['email']);  
                $pass=($_POST['pass']);  
              
                $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
                mysqli_select_db($con,'book_store') or die("cannot select DB");  

                $query1="SELECT * FROM seller WHERE `email`='$user' OR `mobile`='$user' AND `pass`='$pass'";
                $query=mysqli_query($con,$query1);# or die(mysqli_error());  
                $numrows=mysqli_num_rows($query);
                $dbusername;
                $dbpassword;
                $first;  $middle; $mobile; $last;
                if($numrows>0){  
                    while($row=mysqli_fetch_array($query)){  
                        $dbusername=$row['email'];  
                        $dbpassword=$row['pass'];
                        $first=$row['first']; 
                        $middle=$row['middle']; 
                        $last=$row['last']; 
                        $mobile=$row['mobile'];
                        
                    }  
                    
                    if($user == $user && $pass == $dbpassword){  
                        session_start();  
                        $_SESSION['user']=$first;
                        $_SESSION['middle']=$middle;
                        $_SESSION['last']=$last;
                        $_SESSION['email']=$dbusername;
                        $_SESSION['mobile']=$mobile;
                        $_SESSION['seller']='seller';
                       
                        header("Location: Index_logged.php");  
                    }  
                    else {
                        echo '<script type="text/javascript">alert("Wrong E-mail ID or Password!!!");window.location("login.php?value=login")</script> ';
                        
                    }
                } 
                else {
                    echo '<script type="text/javascript">alert("Wrong E-mail ID or Password!!!");window.location("login.php?value=login")</script> ';
                    
                }
              
            } 
            else {  
                echo "All fields are required!";  
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
<?php
    if(isset($_GET['value'])){
        $valueofuser=$_GET['value'];
        if($valueofuser=="register"){
        echo '
       <div class="login">
           <div class="container">
            <h3 class="animated zoomIn" data-wow-delay=".2s" >Register</h3>
          	<p class="est animated zoomIn" data-wow-delay=".2s">Please fill up the form</p>
			<div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                <form action="welcomeseller.php" enctype="multipart/form-data" method="POST">
                    
                    <input type="text" placeholder="First Name" required name="first_n" >
                    <input type="text" placeholder="Last Name" required name="last_n" >
                    <input type="text" placeholder="Middle Name"  name="middle_n" ><br>
                    <input type="text" placeholder="Mobile Number"  name="mobile" pattern="(?=.*\d).{10,10}"><br>
                    <input type="email" placeholder="Email Address" 
                    required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9_]+\.[a-z.]{2,}$" title="Please enter valid Email address" name="email">
					
                    <input type="password" placeholder="Password" required name="pass" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >
					
					<button  type="submit" value="register" align="middle" name="action">Register</button>
                    <button><a href="login.php?value=login">&nbsp;Register as a User</a></button>
                </form>
                <h4 class="animated slideInUp" data-wow-delay=".2s" align="middle">If already registered</h4>
			<p class="animated slideInUp" data-wow-delay=".2s" align="middle"><a href="login.php">Login Here</a> (Or) go back to <a href="index_logged.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
            
            </div>
             </div>
        </div>';
        }
        elseif($valueofuser=='login'){
            echo '
            <div class="header">
            <div class="container">    
             <div class="login">
                   <div class="container">
                        <h3 class="animated zoomIn" data-wow-delay=".2s" align="middle">Login Form</h3>
                            <p class="est animated zoomIn" data-wow-delay=".2s">Please Enter Your Login Information</p>
                                <div class="login-form-grids animated slideInUp" data-wow-delay=".1s">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <input type="text" name="email" placeholder="Email Address Or Mobile Number" required=" " title="Please enter valid Email address or valid Mobile Number" >
                                        <input type="password" name="pass" placeholder="Password" required=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one uppercase ,lowercase letter,one number, and at least 6 or more characters" >
                                        <div class="forgot">
                                            <a href="forgotpass.php">Forgot Password?</a>
                                        </div>
                                        <button type="submit"  name="submit">Login</button>
                                        <button><a href="login.php?value=login">&nbsp;Login as a User</a></button>
                                    </form>
                                </div>
                        <h4 class="animated slideInUp" data-wow-delay=".2s" align="middle">If not registered</h4>
                        <p class="animated slideInUp" data-wow-delay=".2s" align="middle"><a href="register.php">Register Here</a> (Or) go back to <a href="index_logged.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
                    </div>
                </div> 
        </div>  
        </div>';
        }


}
?>
        
    </body>
</html>