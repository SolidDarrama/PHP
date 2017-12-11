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
//FINDS THE USERS FAVORITE INFROMATION - DATABASE
    $db_name="test"; // Database name
    $tbl_name="personal"; // Table name
    
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");
    
    //handles the empty username session
    if(empty($_SESSION['myusername'])){
        echo "NO SHIPPING INFORMATION AVALIABLE";
        error_reporting(E_ALL & ~E_NOTICE);
    }
    else {
        //username from session
        $myusername=$_SESSION['myusername'];
        echo "User: ".$myusername;
    }

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
    
//FINDS THE USERS ADDRESS INFROMATION - DATABASE
    $db_name="test"; // Database name
    $tbl_name="address"; // Table name
    
    // Connect to server and select databse.
    // Connect to server and select databse.
    $link = mysqli_connect('localhost','root','')or die("cannot connect");
    mysqli_select_db($link,$db_name)or die("cannot select DB");

    // To protect MySQL injection (more detail about MySQL injection)
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
    $result=mysqli_query($link,$sql);
    
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    
    echo "<table>"; // start a table tag in the HTML
    echo "<br>";
    echo "Address Information:";
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        if ($myusername == $row['username']);
        {
        echo nl2br ("\nStreet: ". $row['street']);  //$row['index'] the index here is a field name
        echo nl2br ("\nCity: ". $row['city']);
        echo nl2br ("\nState: ". $row['state']);
        echo nl2br ("\nZip: ". $row['zip']);
        echo nl2br ("\nCountry: ". $row['country']);
        }
    }
   
    echo "</table>"; //Close the table in HTML
    mysqli_close($link); //Make sure to close out the database connection
?>
<form action="MusicStoreV1_login.php" method="post">
 <br><input type="submit" name="logout" value="logout">
</form>