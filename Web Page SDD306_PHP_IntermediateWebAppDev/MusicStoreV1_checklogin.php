<html lang = "en">
   <head>
      <title>Wilmu Sound Store/Login</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <style>
         body {
            position: relative;
            top: 12px;
            color: white;
               }
             h2{
                text-align: center;
                color: #017572;
               }
      </style>
   </head>
 <h2>INCORRECT</h2> 
         
<?php
    include('MusicStoreV1_style.css');
    session_start();
    
    $db_name="test"; // Database name
    $tbl_name="members"; // Table name
    
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");
    
    // username and password sent from form
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];
    
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysqli_real_escape_string($link,$myusername);
    $mypassword = mysqli_real_escape_string($link,$mypassword);
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
    $result=mysqli_query($link,$sql);
    
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        $_SESSION["myusername"] = $myusername;
        $_SESSION["mypassword"] = $mypassword;
        header("location:MusicStoreV1_personal.php");
    }
    else {
        echo "Wrong Username or Password";
    }
?>