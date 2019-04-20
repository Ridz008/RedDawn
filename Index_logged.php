<?php
    session_start();
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


<script>
 new WOW().init();
</script>
    <style>
       
div.leftt {
    float: left;
    padding: 20px;
    width: 85%;
    
}
.rightnav{
    margin-top:20px;
    padding: 15px;
    padding-bottom:25px;
}
/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}  
div.navv {
float: left;
width: 15%;
height:auto; /* only for demonstration, should be removed */

padding: 20px;
}  
    </style>
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

<div class="banner" style="z-index:0">
		<div class="container">
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3>Buy Your Favourite books</h3>
				<h4>Up to <span>50% <i>Off/-</i></span></h4>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>You don't have to go to library</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>We Provide What You Need</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>Education+Novel+Free-time+Sci-fi+Comic</p>
								</div>
							</div>
						</article>
					</div>
				</div>
					<script src="js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
			</div>
		</div>
	</div>
<!-- //banner -->
<div class="banner-bottom">
        <div class="container"> 
			<div class="banner-bottom-grids">
				
                <div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="im/a81.jpeg" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-pos">
							<p><b>Discount 45%</b></p>
						</div>
					</div>
					
                </div>
               
                <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="im/a61.jpeg" alt=" " class="img-responsive" />
						</div>
						<div class="grid-left-grid1-pos" >
							<p><b>top and classic designs</b> <span><b>2018 Collection</b></span></p>
						</div>
					</div>
                </div>
                <div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="margin-right:1px">
					<div class="grid">
						<figure class="effect-julia">
							<img src="im/book61.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3>Top <span>Selling</span></h3>
								<div>
									<p>Trending</p><br>
                                    <p>People's Top Choice</p><br>
                                    <p>Bestseller</p>							
								</div>
							</figcaption>			
						</figure>
					</div>
                </div>
				<div class="clearfix"> </div>

            </div>
        </div>
    </div>

<!-- Slideshow -->
   <!--Popular Books-->
<?php
include "dbconnect.php";
$query = "SELECT * FROM products INNER JOIN popular WHERE products.pid=popular.pid ORDER BY popular.visit desc";
$result = mysqli_query ($con,$query)or die(mysql_error());
 $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:Black;text-transform:uppercase;margin-bottom:0px;"> POPULAR BOOKS </h2>
           </div>
        </div>  
        <div class="container">   '; 
        

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
                <div class="col-sm-6 col-md-3 col-lg-3 text-center" >
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" max-height="100px" src="'.$path.'">
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
                break;
            }
        }
    echo '</div></div></div>';
    ?>

<!-- Popular Books --><br><br>
<!--Different images-->
<div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:black;text-transform:uppercase;margin-bottom:0px;"> Books and Categories </h2>
           </div>
<section>
    <div class="navv">

    <div class="vertical-menu">
            <a href="#" class="active">Home</a>
            <a href="Product.php?value=Literature%20and%20Fiction">Literature and Fiction</a>
            <a href="Product.php?value=Biographies%20and%20Auto%20Biographies">Biographies</a>
            <a href="author.php?value=dan%20brown">Crime,Thriller and Suspense</a>
            <a href="product.php?value=comics">Comic Books</a>
            <a href="author.php?value=chetan%20bhagat">Romance</a>
            <a href="Product.php?value=Business%20and%20Management">Buisness and Management</a>
            <a href="Product.php?value=Children%20and%20Teens">Children and teens</a>
            <a href="Product.php?value=Academic%20and%20Professional">Academics and Professional</a>
            <a href="Product.php?value=entrance%20exam">Education</a>
            <a href="Product.php?value=entrance%20exam">Entrance Exam</a>
           

            <a href="Product.php?value=Health%20and%20Cooking">Health and Cooking</a>
            <a href="#author">Go to Popular Authors</a>
        </div>
    </div>   
<!--New section-->
<div class="leftt">
<!--Different images-->

<div style="max-width:80%;margin:12%;margin-bottom:5px;margin-top:5px">
<div class="container-fluid text-center" id="new">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-5&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="book block-center img-responsive" src="images/a1.jpeg">
                <hr>
                Scared Games Part 1 <br>
                Rs 231  &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 499 </span>
                <span class="label label-warning"> 53% </span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-6&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="images/a2.jpeg">
                <hr>
                Sacred Games Part 2  <br>
                Rs 243 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 499 </span>
                <span class="label label-warning">51%</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=lit-34&category=literature%20&%20fiction">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="images/a3.jpeg">
                <hr>
                Dan Brown Origin <br>
                Rs 391 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 799 </span>
                <span class="label label-warning">51%</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=BUS-13&category=Business%20and%20Management">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="images/a4.jpeg">
                <hr>
                The Future of Indian Economy <br>
                Rs 340 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 795 </span>
                <span class="label label-warning">57%</span>
            </div>
          </a>
        </div>
    </div>
</div>
</div>
<!--DIfferent Books-->

<div style="max-width:80%;margin:12%;margin-bottom:5px;margin-top:5px ">
<div class="container-fluid text-center" id="new">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=LIT-19">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="book block-center img-responsive" src="images/b1.jpg">
                <hr>
                Revolution 2020 <br>
                Rs 132  &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 176 </span>
                <span class="label label-warning">25%</span>
                
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=COM-1">
            <div class="book-block">
                <div class="tag floatprop">Comic Book</div>
                <div class="tag-side floatprop"><img src="img/tag.png" ></div>
                <img class="block-center img-responsive"  src="images/b2.jpg">
                <hr>
                Captain Marvel  <br>
                Rs 1007 &nbsp
                <span style="text-decoration:line-through;color:#828282;">1075 </span>
                <span class="label label-warning">6%</span>
                </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=COM-5&category=comics">
            <div class="book-block">
                <div class="tag floatprop">Comic Book</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="images/b3.jpg" >
                <hr>
                Batman Volume 4 <br>
                Rs 999&nbsp
                <span style="text-decoration:line-through;color:#828282;"> 999 </span>
                
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-10&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="images/a5.jpeg">
                <hr>
                Turtles All the way Down <br>
                Rs 932 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 1323 </span>
                <span class="label label-warning">30%</span>
                
            </div>
          </a>
        </div>
    </div>
</div>
</div>
<!--Different images-->
<div style="max-width:80%;margin:12%;margin-bottom:5px;margin-top:5px">
<div class="container-fluid text-center" id="new">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-1&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="book block-center img-responsive" src="img/new/1.jpg">
                <hr>
                Like A Love Song <br>
                Rs 113  &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                <span class="label label-warning">35%</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-2&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="img/new/2.jpg">
                <hr>
                General Knowledge 2017  <br>
                Rs 68 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 120 </span>
                <span class="label label-warning">43%</span>
            
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-3&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="img/new/3.png">
                <hr>
                Indian Family Bussiness Mantras <br>
                Rs 400 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 595 </span>
                <span class="label label-warning">33%</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
         <a href="description.php?ID=NEW-4&category=new">
            <div class="book-block">
                <div class="tag floatprop">New</div>
                <div class="tag-side floatprop"><img src="img/tag.png"></div>
                <img class="block-center img-responsive" src="img/new/4.jpg">
                <hr>
                Kiran s SSC Mathematics Chapterwise Solutions <br>
                Rs 289 &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 435 </span>
                <span class="label label-warning">33%</span>
            </div>
          </a>
        </div>
    </div>
</div>
</div>
<!--end-->
</div >
</section>
<!--Authors-->
<div class="container-fluid" id="author">
    <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block" src="img/popular-author/0.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="img/popular-author/1.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="img/popular-author/2.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="img/popular-author/3.jpg"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="img/popular-author/4.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="img/popular-author/5.jpg"><a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="img/popular-author/6.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="img/popular-author/7.jpg"></a>
        </div>
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

    </body>

</html>