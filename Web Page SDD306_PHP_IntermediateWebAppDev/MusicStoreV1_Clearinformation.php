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
               text-align: center;
            }
          </style>
        <title>Wilmu Sound Store</title>
    	<meta charset="utf-8" />
    </head>
    <h2>ClearInformation</h2>
<?php
include('MusicStoreV1_style.css');
session_start();
session_unset();
echo "The stored information was cleared, please select a navigational-tab.";

?>