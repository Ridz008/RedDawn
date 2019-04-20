<?php
$first_name = $_POST["first_n"];
$last_name = $_POST["last_n"];
$middle_name = $_POST["middle_n"];
$password = $_POST["pass"];
$email = $_POST["email"];
$mobile=$_POST["mobile"];
//if( (isset($_POST['register'])) && (!empty('$first_n') || !empty('$last_n') || !empty('$middle_n') || !empty('$email') || !empty('$pass') ))
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "book_store";
    //create connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
    
    $query1="SELECT * FROM register WHERE `email`='$email' OR `mobile`='$mobile'";
    $query=mysqli_query($conn,$query1); 
    $numrows=mysqli_num_rows($query);
    echo "$numrows";
    if($numrows>0){
        echo "<script> alert('Email or Mobile Number already taken'); window.location='login.php?value=register';</script>";
    }
    else{
     $sql = "INSERT Into register (first_n,last_n,middle_n,email,pass,mobile) values('$first_name','$last_name','$middle_name','$email','$password','$mobile')";
     $sql1 = "INSERT Into custorder (customer,user,quantity) values('$email','$first_name',0)";
     
     mysqli_query($conn,$sql1);
     if (mysqli_query($conn, $sql)) {

        session_start();  
        $_SESSION['sess_user']=$user;  
        $userdata=array("email"=>"$dbusername");
        header("Location: Login.php?value=login");  
        $to=$_POST['email'];
        $subject = 'Registration Successful';
        $message = "Welcome to Reddawn Bookstore\nDear $first_name $middle_name $last_name,\nYour Registration is Successful.\n
         <h2>Browse Books and get at lowest price</h2>";
        $headers='From: Reddawn';

        
        if(mail($to,$subject,$message,$headers))
            echo "<script> window.location('login.php?value=login');</script>";
            else
            echo "<script> alert('Mail sending Failed'); window.location('login.php?value=login');</script>";
       
    } else {
        echo "<script> alert('Duplicate Entry'); window.location='login.php?value=register';</script>";
        // header("Location: Login.php?value=register"); 
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        // die();
    }
}
    
    mysqli_close($conn);
     


?>
