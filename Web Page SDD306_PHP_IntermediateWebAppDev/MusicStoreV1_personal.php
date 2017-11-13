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
 <h2>Personal Page</h2> 
         
<?php
    include('MusicStoreV1_style.css');
    session_start();
    echo "Welcome ". $_SESSION['myusername'];
    echo ", your favorite album is ".$_SESSION['myalbum'];
?>

<form action="MusicStoreV1_login.php" method="post">
 <br><input type="submit" name="logout" value="logout">
</form>