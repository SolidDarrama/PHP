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
 <h2>Registration</h2> 
         
<?php
    error_reporting(0);
    include('MusicStoreV1_style.css');
    session_start();

    $db_name="test"; // Database name
    $tbl_name="members"; // Table name
    
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");

   if(isset($_POST['myname'])){
       $userName = $_POST['myname'];
   }
   if(isset($_POST['mypass'])){
       $passWord = $_POST['mypass'];
   }
    
    $sql = "INSERT INTO members (username, password)
    VALUES ('$userName','$passWord')";
    
    if ($link->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    
    $link->close();
?>

<form action="createpersonal.php" method="post">
 <p>New Username: <input type="text" name="myname" id="myname"/></p>
  <p>New Password: <input type="text" name="mypass" id="mypass"/></p>
 <p><input type="submit" /></p>
</form>