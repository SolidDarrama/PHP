<html lang = "en">
   <head>
      <title>Wilmu Sound Store/Login</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <style>
         body {
                position: relative;
                top: 12px;
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
      </style>
   </head>
 <h2>Shipping Input</h2> 
         
<?php
     include('MusicStoreV1_style.css');
     session_start();
     error_reporting(0);
     
     $db_name="test"; // Database name
     $tbl_name="address"; // Table name
     
     // Connect to server and select databse.
     $link = mysqli_connect('localhost','root','')or die("cannot connect");
     mysqli_select_db($link,$db_name)or die("cannot select DB");
     //checks when the btn is clicked; helps to prevent blank input into the database table
     if(isset($_POST['Submit']))
     {
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
         
         $sql = "INSERT INTO members (street, city, state, zip, country)
        VALUES ('$useStreet','$useCity','$useState','$useZip','$useCountry')";
         
         if ($link->query($sql) === TRUE) {
             echo "";
         } else {
             echo "Error: " . $sql . "<br>" . $link->error;
         }
         mysqli_close($link);
         header("Location: createpersonal.php");
     }
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form name="form1" method="post" action="MusicStoreV1_checklogin.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                <td colspan="3"><strong>Shipping Address </strong></td>
                </tr>
                <tr>
                <td width="78">Street</td>
                <td width="6">:</td>
                <td width="294"><input name="mystreet" type="text" id="mystreet"></td>
                </tr>
                <tr>
                <td>City</td>
                <td>:</td>
                <td><input name="mycity" type="text" id="mycity"></td>
                </tr>
                                <tr>
                <td>State</td>
                <td>:</td>
                <td><input name="mystate" type="text" id="mystate"></td>
                </tr>
                                <tr>
                <td>Zip</td>
                <td>:</td>
                <td><input name="myzip" type="text" id="myzip"></td>
                </tr>
                                <tr>
                <td>Country</td>
                <td>:</td>
                <td><input name="mycountry" type="text" id="mycountry"></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="submit"></td>
                </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
<br>
<div>
 <form action="MusicStoreV1_purchases.php" method="post">
        <input type="submit" name="returnBtn" value="Return to Purchase Page">
 </form>
</div>
