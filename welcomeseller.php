<?php
$first_name = $_POST["first_n"];
$last_name = $_POST["last_n"];
$middle_name = $_POST["middle_n"];
$password = $_POST["pass"];
$email = $_POST["email"];
$mobile=$_POST["mobile"];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "book_store";
    //create connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
    
    $query1="SELECT * FROM seller WHERE `email`='$email' OR `mobile`='$mobile'";
    $query=mysqli_query($conn,$query1); 
    $numrows=mysqli_num_rows($query);
    echo "$numrows";
    if($numrows>0){
        echo "<script> alert('Email or Mobile Number already taken'); window.location='login.php?value=register';</script>";
    }
    else{
     $sql = "INSERT Into seller values('$first_name','$middle_name','$last_name','$email','$mobile','$password')";
     if (mysqli_query($conn, $sql)) {
        session_start();  
        $_SESSION['sess_user']=$user;  
        $userdata=array("email"=>"$dbusername");
        header("Location: seller.php?value=register");  
        $to=$_POST['email'];
        $subject = 'Seller registration Successful';
        $message = "Welcome to Reddawn Bookstore\nDear $first_name $middle_name $last_name,\nYour Registration is Successful. 
        For adding books clickk on add books.";
        $headers='From: Reddawn';
        if(mail($to,$subject,$message,$headers))
            echo "<script> alert('Email has been registered. Please Check your mail'); window.location('seller.php?value=register');</script>";
            else
            echo "<script> alert('Mail sending Failed'); window.location('seller.php?value=register');</script>";
       
    } else {
        echo "<script> alert('Duplicate Entry'); window.location='login.php?value=register';</script>";
    }
}
    
    mysqli_close($conn);
     


?>
