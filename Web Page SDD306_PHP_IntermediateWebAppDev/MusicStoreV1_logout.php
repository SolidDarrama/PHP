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
 <h2>Logged Out</h2> 
         
<?php
    include('MusicStoreV1_style.css');
    session_start();
    session_unset();
    echo "Logging out...You have successfully logged out."
?>