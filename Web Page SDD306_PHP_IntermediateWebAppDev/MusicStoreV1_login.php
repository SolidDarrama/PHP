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
 <h2>Account</h2> 
         
<?php
     include('MusicStoreV1_style.css');
     session_start();
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form name="form1" method="post" action="MusicStoreV1_checklogin.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                <td colspan="3"><strong> Login </strong></td>
                </tr>
                <tr>
                <td width="78">Username</td>
                <td width="6">:</td>
                <td width="294"><input name="myusername" type="text" id="myusername"></td>
                </tr>
                <tr>
                <td>Password</td>
                <td>:</td>
                <td><input name="mypassword" type="text" id="mypassword"></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Login"></td>
                </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
<br>
<div>
 <form action="MusicStoreV1_login.php" method="post">
        <input type="submit" name="Regist" value="Do you need to Register?">
 </form>
</div>

<?php
if(isset($_POST['Regist'])){
header("Location: newuserregistration.php");
exit;
}