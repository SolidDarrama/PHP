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
    
    $db_name="test"; // Database name
    $tbl_name="personal"; // Table name
    
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");
    
    // username and password sent from form
    $myusername=$_SESSION['myusername'];
    echo "User: ".$myusername;
    
    // To protect MySQL injection (more detail about MySQL injection)
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
    $result=mysqli_query($link,$sql);
    
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    
    echo "<table>"; // start a table tag in the HTML
    
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        if ($myusername == $row['username']);
        echo nl2br ("\nFavorite Album: ". $row['favorite']);  //$row['index'] the index here is a field name
    }
    
    echo "</table>"; //Close the table in HTML
    mysqli_close($link); //Make sure to close out the database connection

?>

<form action="MusicStoreV1_login.php" method="post">
 <br><input type="submit" name="logout" value="logout">
</form>