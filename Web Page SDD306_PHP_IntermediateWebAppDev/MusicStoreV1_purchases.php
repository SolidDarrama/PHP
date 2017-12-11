<!DOCTYPE html>
<html>
    <head>
          <style>
             h2{
                text-align: center;
                color: #017572;
             }
             body
            {
               color: white;
            }
            form 
            { 
                position: relative;
                padding-top: 15px;
            }
          </style>
        <title>Wilmu Sound Store</title>
    	<meta charset="utf-8" />
    </head>
    <h2>Shopping Cart</h2>
<body>

<?php
    session_start();
    include('MusicStoreV1_style.css');

    if(empty($_SESSION['albums'])){
        echo "SHOPPING CART EMPTY";
        error_reporting(E_ALL & ~E_NOTICE);
    }
    
    $counter=0;
    if(isset($_SESSION['albums'])){ 
        foreach ($_SESSION['albums'] as $item) {
            $counter++;
            echo "Album ".$counter." - $".$item."<br>";
        }
        echo "_________________"."<br>";
        echo "Total Cost: $" . $_SESSION['Total'];
    }
    
?>
    <form action="MusicStoreV1_Clearinformation.php" method="post">
        <button class="button">Clear my Cart</button>
    </form></br>
    <?php 
    $db_name="test"; // Database name
    $tbl_name="address"; // Table name
    
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
    echo  $myusername. "'s Current Address Information";
    }
    
    // To protect MySQL injection (more detail about MySQL injection)
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
    $result=mysqli_query($link,$sql);
    
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    
    echo "<table>"; // start a table tag in the HTML
    
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
 <form action="shipping.php" method="post">
    <button class="button">Enter New Shipping Information</button>
</form>