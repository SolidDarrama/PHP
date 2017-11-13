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
 <h2>Things about you!</h2> 
         
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


   $userName = $_SESSION['myusername'];

   if(isset($_POST['myalbum'])){
       $favorite = $_POST['myalbum'];
       $_SESSION['myalbum']=$_POST['myalbum'];
   }
   
    $sql = "INSERT INTO personal (username, favorite)
    VALUES ('$userName','$favorite')";
    
    if ($link->query($sql) === TRUE) {
        echo "New record created successfully. Please continue to fill out your bio!";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
?>

<form action="createpersonal.php" method="post">
  <p>Favorite Album: <input type="text" name="myalbum" id="myalbum"/></p>
 <p><input type="submit" /></p>
</form>
<form action="MusicStoreV1_login.php" method="post">
   <input type="submit" name="next" value="Go to login Page">
</form>