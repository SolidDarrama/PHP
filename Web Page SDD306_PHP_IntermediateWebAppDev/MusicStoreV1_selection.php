<!DOCTYPE html>
<html>
    <head>
          <style>
          
             h2{
                text-align: center;
                color: #017572;
               }
           form
            {
               font-size: 1em !important;
               font-family: Arial !important;
               font-size: 250%;
            }
           body
            {
               color: white;
            }
            .container 
            { 
                position: relative; 
                width: 100px; 
                height: 100px; 
                float: left; 
                margin-left: 10px; 
                padding-top: 30px;
                padding-bottom: 30px;
            }
            .checkbox 
            { 
                position: absolute; 
                bottom: 0px; 
                right: 0px; 
            }
           .submitClass 
            { 
                position: absolute; 
                width: 20px; 
                height: 20px; 
                left: 18px
            }
          </style>
        <title>Wilmu Sound Store</title>
      <meta charset="utf-8" />
    </head>
  <h2>Albums</h2>

<?php
    session_start();
    include('MusicStoreV1_style.css');
?>
    
 <form action="MusicStoreV1_selection.php" method="post">
    <div class="container">
    <img src="album1.jpg" alt="2PAC" width="100" height="100" id="album1">
    <input type="checkbox" name="albums[]" value="3"> 2pac Album - $3<br>
    </div>
    <div class="container">
    <img src="album2.jpg" alt=BEAT width="100" height="100" id="album2">
    <input type="checkbox" name="albums[]" value="4"> Beatles Album - $4<br>
    </div>
     <div class="container">
    <img src="album3.jpg" alt="JACK" width="100" height="100" id="album3">
    <input type="checkbox" name="albums[]" value="5"> M.J Album - $5<br>
    </div>
    <div class="container">
    <img src="album4.jpg" alt="DRAK" width="100" height="100" id="album4">
    <input type="checkbox" name="albums[]" value="6"> Drake Album -$6<br>
    </div>
    <div class="container">
    <img src="album5.jpg" alt="COLDP" width="100" height="100" id="album5">
    <input type="checkbox" name="albums[]" value="4"> Coldplay Album - $4<br>
    </div>
    <div class="container">
    <img src="album6.jpg" alt="TAYL" width="100" height="100" id="album6">
    <input type="checkbox" name="albums[]" value="5"> Tayler S. Album - $5<br>
    </div>
    <div class="submitClass">
    <input type="submit" id="submit" name="submit" />
    </div>
</form>

<?php

    $Total=0;

    if(isset($_POST['albums'])){ //validates that the array exist without having any values from "checkbox"
        $MyAlbums=$_POST['albums'];
        $_SESSION['albums'] = $_POST['albums'];
        
        foreach((array) $MyAlbums as $mywish){
            $Total=$Total+$mywish;
            echo $mywish;
            echo "<br>"; 
        }
        $_SESSION['Total'] = $Total;
    }

    if(array_key_exists('submit', $_POST))
    {
        header('Location: MusicStoreV1_purchases.php');
    } 
    
?>