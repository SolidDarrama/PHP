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
               div
               {
              display: flex;
              align-items: center;
              justify-content: center;
               }
               input
               {
              display: flex;
              align-items: center;
              justify-content: center;
               }
      </style>
   </head>
 <h2>Shipping Input</h2> 
         
<?php
     include('MusicStoreV1_style.css');
     session_start();
     error_reporting(0);
     
     $db_name="test"; // Database name
     $tbl_name="members"; // Table name
     
     // Connect to server and select databse.
     $link = mysqli_connect('localhost','root','')or die("cannot connect");
     mysqli_select_db($link,$db_name)or die("cannot select DB");
     //checks when the btn is clicked; helps to prevent blank input into the database table
     if(isset($_POST['submitBTN']))
     {
         $useName = $_SESSION['myname'];
         
         if(isset($_POST['mystreet'])){
             $useStreet = $_POST['mystreet'];
             $_SESSION['mystreet'] = $_POST['mystreet'];
         }
         if(isset($_POST['mycity'])){
             $useCity = $_POST['mycity'];
             $_SESSION['mycity'] = $_POST['mycity'];
         }
         if(isset($_POST['mystate'])){
             $useState = $_POST['mystate'];
             $_SESSION['mystate'] = $_POST['mystate'];
         }
         if(isset($_POST['myzip'])){
             $useZip = $_POST['myzip'];
             $_SESSION['myzip'] = $_POST['myzip'];
         }
         if(isset($_POST['mycountry'])){
             $useCountry = $_POST['mycountry'];
             $_SESSION['mycountry'] = $_POST['mycountry'];
         }
         
         $sql = "INSERT INTO address (username, street, city, state, zip, country)
        VALUES ('$useName','$useStreet','$useCity','$useState','$useZip','$useCountry')";
         
         if ($link->query($sql) === TRUE) {
             echo "";
         } else {
             echo "Error: " . $sql . "<br>" . $link->error;
         }
         mysqli_close($link);
         header("Location: MusicStoreV1_purchases.php");
     }
?>
<div>
 <form action="shipping.php" method="post">
   <p>Street<input type="text" name="mystreet" id="mystreet"/></p>
   <p>City<input type="text" name="mycity" id="mycity"/></p>
   <p>State<input type="text" name="mystate" id="mystate"/></p>
   <p>Zip<input type="text" name="myzip" id="myzip"/></p>
   <p>Country<input type="text" name="mycountry" id="mycountry"/></p>
   <input type="submit" name="submitBTN" value="Submit">
   </br>
   <input type="submit" name="returnBtn" value="Return to Purchase Page">
 </form>
</div>
