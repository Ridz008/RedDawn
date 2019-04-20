<?php 
	session_start();
	$customer=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD your book</title>
	  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- <link href="css/main.css" rel="stylesheet" type="text/css" media="all" /> -->
        <link href="css/rd.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        
        <link href="css/animate.min.css" rel="stylesheet"> 
        
        <!-- <link href="css/my.css" rel="stylesheet">  -->
        <script src="js/jquery.min.js"></script>

<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


	<style>
    input[type=text], 
    select ,textarea {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #3498DB;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=number], 
    select {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #3498DB;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=radio], 
    select {
    width: 5%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #3498DB;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=password], 
    select {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #3498DB;
    border-radius: 4px;
    box-sizing: border-box;
}
body, html {
    /*height: 100%;*/
    margin: 0;
}
.sub{
	padding: 10px;
	width: 200px;
	text-align: center;
	font-weight: bold;
}
button[type=submit],select{
			box-sizing: border-box;
			padding: 10px 40px;
			border: 3px solid #3498DB;
			text-align: center;
			}
input[type=reset],select{
			box-sizing: border-box;
			padding: 10px 40px;
			border: 3px solid #3498DB;
			text-align: center;
			}
			button[type=submit]:hover{
			background-color:#3498DB;}
			input[type=reset]:hover{
			background-color:red;
			border-color: red;
		}
		.im{
			border:3px solid black;
			padding: 8px;
		}
		input[type="file"], select{
			width: 200px;
			height: 50px;
		}
		.b_im{
			text-align: center;
		}
</style>
</head>
<body style="background-size: cover; /*height: 100%;*/ background-repeat: no-repeat">

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
<!-- <div style="padding-bottom:30px;background-color:#2E2E2E"></div> -->
<!--body-->

 <div style="position:sticky;top:0;z-index:1;background-color:#2E2E2E ;padding-top:0 ;margin-top:0">    
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

<form action="" method="POST" enctype="multipart/form-data">
<head>
	<font size="9" face="snap itc" color="#3498DB"><center>ADD BOOK!</center></font>
</head>
<head>
	<h1 style="background-color:gray; height: 45px;" align="center"><b>
		<div  align="right" style="width:58%;float:right;">
			<marquee  direction = "left"  loop="infinite"  scrolldelay="200" scrollamount="20" behavior="slide">BOOK DETAILS</marquee>
		</div>
		</b>
	</h1>
</head>
<!-- Codes by HTMLcodes.ws -->
<hr style="margin-top: 2px; background-color: black;" size="5"><br><br>


<div style="text-align: left;"><caption><font size="+2" text align="center">&nbsp;&nbsp;&nbsp;<u>* marked field are mandatory</u>.</font></caption><br><br>
	<div style="right:150px;top: 400px ;width: 25%;position: absolute;">
        <label><font size="+2" class="b_im"><b>*Enter a book Image:</b></font></label><br>
        <img class="im" id="DP" src="icon-dp.png" height="200" width="200" >
        <input style="font-weight: bold; font-size:14.8px;" type="file" name="book_Pic" accept="Image/*" value="give image" required>
    </div>

	<div style="margin-left: 40px; text-align: left;"><b>Book Title*</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="title" placeholder='e.g. "Operating system"' title="Enter only alphabet" required autocomplete="off" pattern="[&nbsp;A-zA-Z0-9\:]{2,}">
		<br><br>
		<b>Product Id</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="pid" placeholder='e.g. ABC-012 ' pattern="[A-Z].{3}\-[0-9]+[0-9]+[0-9]+" title="Format : ABC-123"  autocomplete="off">
		<br><br>
		
		<b>Edition</b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="edi" placeholder='e.g. 3 ' pattern="[1-9]{1}||[1]{1}[0-5]{1}||[0]{1}[1-9]{1}" title="between 1 to 15"  autocomplete="off">
		<br><br>
		<b>Author Name*</b>&nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="auth" placeholder='e.g. "Andrew S. Tanenbaum"' pattern="[&nbsp;A-Za-z]{4,}" title="Enter only alphbat" required autocomplete="off">
		<br><br>
		<b>MRP*</b> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="mrp" placeholder='e.g. 420' required=""title="Enter only numbers" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<b>Price*</b> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="pri" placeholder='e.g. 420' required=""title="Enter only numbers" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<b>Discount*</b>  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="discount" placeholder='e.g. 420' required=""title="Enter only numbers" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<b>Quantity*</b>  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="qty" placeholder='e.g. 420' required=""title="Enter valid Quantity" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<b>Publisher*</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="pub" placeholder='e.g. "Prentice Hall PTR"' pattern="[&nbsp;A-Za-z]{2,}" title="Enter only alphbat" autocomplete="off" required>
		<br><br>
		<b>Language*</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 		<input type="text" name="lang" placeholder='English' title="Enter Proper text" pattern="[&nbsp;A-Za-z].{3,}"><br><br>
		<b>Description*</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<textarea name="desc" col=40 maxsize=300 ></textarea><br><br>
		<b>Category*</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="cat" placeholder='e.g. "Reference Book"' title="Enter only alphbat" pattern="[&nbsp;A-Za-z]{4,}" required autocomplete="off">
		<br><br>
		<b>Page*</b>  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="page" placeholder='300' required=""title="Enter valid Quantity" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<b>Weight*</b>  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="wt" placeholder='Enter in grams eg 500' required=""title="Enter valid Quantity" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		
	</select>
<br><br><br>
<button class="sub" name="sub_book" type="submit">Submit</button>
<input class="sub" name="reset" type="reset">
<br>
<br><br><br><br>
 </div>
</div>
</form>
</body>
</html>

<?php
	if(isset($_POST['sub_book']))
	{
		include "dbconnect.php";
			$qery_1 = "SELECT * FROM seller WHERE email='$customer'";
			$res = mysqli_query($con,$qery_1);
			$row = mysqli_fetch_array($res);	     
	      	$count = mysqli_num_rows($res);
	      	if ($count==1) {
	      		
			$pid=$_POST['pid'];
		 	$title=$_POST['title'];
		 	$author=$_POST['auth'];
		 	$mrp=$_POST['mrp'];
		 	$price=$_POST['pri'];
		 	$discount=$_POST['discount'];
		 	$qty=$_POST['qty'];
			$pub=$_POST['pub'];
			$edi=$_POST['edi'];
			$cat=$_POST['cat'];
			$desc=$_POST['desc'];
			$lang=$_POST['lang'];
			$page=$_POST['page'];
			$wt=$_POST['wt'];
		 	// $filename = $_FILES['book_Pic']['name'];
     		$filenametmp = $_FILES['book_Pic']['tmp_name'];
     		move_uploaded_file($filenametmp, 'img/books/'.$pid.'.jpg');	
     		
     		
     		

	$sql="INSERT INTO `products`(`PID`, `Title`, `Author`, `MRP`, `Price`, `Discount`, `Available`, `Publisher`, `Edition`, `Category`, `Description`, `Language`, `page`, `weight`)
		VALUES('$pid','$title','$author',$mrp,$price,$discount,$qty,'$pub','$edi','$cat','$desc','$lang','$page','$wt')";
		 	$qry = mysqli_query($con,$sql);
		 	if($qry)
		 	{

				 echo '<script>
				 $varr="img/books/$pid.jpg";
					alert("data store: Book is added");
					$("#dp").attr("src",$varr);
						</script>';
				
						//  header("Location:index_logged.php");
		 	}
		 	else
		 	{
		 		echo "error";
		 	}
		 }else
		 {
		 	echo "eeeeeee";
		 }
		}
		else
		{
			echo "error post";
		}

?>
