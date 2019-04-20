

<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD your book</title>
	<style>
    input[type=text], 
    select {
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
<body style="background-image:url(image_s/PicsArt_10-02-09.59.22.jpg);background-size: cover; /*height: 100%;*/ background-repeat: no-repeat">
<?php
echo $user;
?>
<form action="Add_book.php" method="POST" enctype="multipart/form-data">
<head>
	<font size="9" face="snap itc" color="#3498DB"><center>ADD BOOK!</center></font>
</head>
<head>
	<h1 style="background-color:gray; height: 45px;" align="center"><b>
		<div  align="right" style="width:52%;float:right;">
<marquee  direction = "left"  loop="1"  scrolldelay="200" scrollamount="20" behavior="slide">BOOK DETAILS</marquee>
</div>
<marquee></marquee>
</b>
	</h1>
</head>
<!-- Codes by HTMLcodes.ws -->
<hr style="margin-top: -20px; background-color: black;" size="5"><br>
</div>
<br>


<div style="text-align: left;"><caption><font size="+2" text align="center">&nbsp;&nbsp;&nbsp;<u>* marked field are mandatory</u>.</font></caption><br><br>
	<div style="right:150px;top: 200px ;width: 25%;position: absolute;">
        <label><font size="+2" class="b_im"><b>*Enter a book Image:</b></font></label><br>
        <img class="im" id="DP" src="image_s/icon-dp.png" height="200" width="200" >
        <input style="font-weight: bold; font-size:14.8px;" type="file" name="book_Pic" accept="Image/*" value="give image" required>
    </div>

	<div style="margin-left: 40px; text-align: left;"><b>Book Name*</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="bok_name" placeholder='e.g. "Operating system"' title="Enter only alphbat" required autocomplete="off" pattern="[A-Az-Z]{2,}">
		<br><br>
		<b>Part</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="part_" placeholder='e.g. I ' pattern="[(1)+]{1,}" title="between 1 to 16"  autocomplete="off">
		<br><br>
		
		<b>Edition</b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="edi" placeholder='e.g. 3 ' pattern="[1-9]{1}||[1]{1}[0-5]{1}||[0]{1}[1-9]{1}" title="between 1 to 15"  autocomplete="off">
		<br><br>
		<b>Authoe Name*</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="auth_name" placeholder='e.g. "Andrew S. Tanenbaum"' pattern="[A-Az-Z]{4,}" title="Enter only alphbat" required autocomplete="off">
		<br><br>
		<b>Price*</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
		<input type="text" name="pri" placeholder='e.g. 420' required=""title="Enter valid pric(only numbers)" pattern="[1-9]{1}[(0-9)+]{0,}||[0]{1}[(1-9)]{1}[(0-9)+]{0,}" autocomplete="off" required>
		<br><br>
		<!--<b>Book Image*</b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="file" name="imgg" placeholder='' accept="Image/*" title="Enter valid name" required>
		<br><br>-->
		<b>Publication*</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="publi" placeholder='e.g. "Prentice Hall PTR"' pattern="[A-Az-Z]{2,}" title="Enter only alphbat" autocomplete="off" required>
		<br><br>
		<b>Bill*</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 		<input name="bill" value="Yes" type="radio" required > 
 	&nbsp;Yes &nbsp; &nbsp;
 	<input name="bill" value="No" type="radio"> &nbsp; No<br><br>

		<b>Type*</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tpe" placeholder='e.g. "Reference Book"' title="Enter only alphbat" pattern="[A-Az-Z]{4,}" required autocomplete="off">
		<br><br>
		Condition* &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
		<select name="condi" required>
		<option selected hidden value="">Select Code</option>
		<option value="Very Good">Very Good</option>
		<option value="Good">Good</option>
		<option value="Useable">Useable</option>
		<option value="Bad">Bad</option>
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
		/*echo '<script>
					alert("Email send");
						</script>';*/
		$db = new mysqli('localhost','root','','book');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$myusername = mysqli_real_escape_string($db,$_POST['Username']);
			$qery_1 = "SELECT * FROM registration WHERE `Email`='$user'";
			$res = mysqli_query($db,$qery_1);
			$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	      // $m= $row['Email'];
	      // echo $row['Pass'];
	      	$count = mysqli_num_rows($res);
	      	if ($count==1) {
	      		
	      	
			$sell_id=$row['ID'];
			$tem_book=mysqli_real_escape_string($db,$_POST['bok_name']);
		 	$part=mysqli_real_escape_string($db,$_POST['part_']);
		 	$edition=mysqli_real_escape_string($db,$_POST['edi']);
		 	$pub=mysqli_real_escape_string($db,$_POST['publi']);
		 	$price=mysqli_real_escape_string($db,$_POST['pri']);
		 	$bil=mysqli_real_escape_string($db,$_POST['bill']);
		 	$typ=mysqli_real_escape_string($db,$_POST['tpe']);
		 	$cond=mysqli_real_escape_string($db,$_POST['condi']);
		 	$filename = $_FILES['book_Pic']['name'];
     		$filenametmp = $_FILES['book_Pic']['tmp_name'];
     		$folder='upload_img';
     		move_uploaded_file($filenametmp, $folder.$filename);	
     		
     		if($part!=null)
     		{
     			$book_name="$tem_book"." $part";	
     		}
     		else
     		{
     			$book_name="$tem_book";
     		}
     		

$sql="insert into book_det(seller_id,Book_name,Edition,Publication,Price,Book_image,Bill,type,Book_Cond) VALUES('$sell_id','$book_name','$edition','$pub','$price','$filename','$bil','$typ','$cond')";
		 	$qry = mysqli_query($db,$sql);
		 	if($qry)
		 	{
		 		echo '<script>
					alert("data store: bool is added");
						</script>';
						header("Location: main_Page_book.php");
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
}
?>