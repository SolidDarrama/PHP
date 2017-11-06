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
</form>
