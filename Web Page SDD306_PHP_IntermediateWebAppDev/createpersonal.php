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
    
    $userName = $_SESSION['myname'];
    echo "Hi ".$userName.", Enter Your Favorite Album: ";
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");
    if(isset($_POST['submitBTN']))
    {
       $userName = $_SESSION['myname'];
        
       if(isset($_POST['myalbum'])){
           $favorite = $_POST['myalbum'];
           $_SESSION['myalbum']=$_POST['myalbum'];
       }
       
        $sql = "INSERT INTO personal (username, favorite)
        VALUES ('$userName','$favorite')";
        
        if ($link->query($sql) === TRUE) {
            echo "Complete";
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
        
        mysqli_close($link);
        header("Location: MusicStoreV1_login.php");
    }
?>

<form action="createpersonal.php" method="post">
  <p>Favorite Album: <input type="text" name="myalbum" id="myalbum"/></p>
 <input type="submit" name="submitBTN" value="Complete / Return to Login Page">
</form>