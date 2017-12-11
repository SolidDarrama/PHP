<!DOCTYPE html>
<html>
    <head>
          <style>
             h2{
                text-align: center;
                color: #017572;
             }
             input[type=text], select, textarea {
                width: 100%; /* Full width */
                padding: 12px; /* Some padding */ 
                border: 1px solid #ccc; /* Gray border */
                border-radius: 4px; /* Rounded borders */
                box-sizing: border-box; /* Make sure that padding and width stays in place */
                margin-top: 6px; /* Add a top margin */
                margin-bottom: 16px; /* Bottom margin */
                resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
            }
            
            /* Style the submit button with a specific background color etc */
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            
            /* When moving the mouse over the submit button, add a darker green color */
            input[type=submit]:hover {
                background-color: #45a049;
            }
            
            /* Add a background color and some padding around the form */
            .container {
                border-radius: 25px;
                background-color: #f2f2f2;
                padding: 30px;
            } 
            #snackbar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                padding: 16px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
            }
            
            #snackbar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }
            
            @-webkit-keyframes fadein {
                from {bottom: 0; opacity: 0;} 
                to {bottom: 30px; opacity: 1;}
            }
            
            @keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }
            
            @-webkit-keyframes fadeout {
                from {bottom: 30px; opacity: 1;} 
                to {bottom: 0; opacity: 0;}
            }
            
            @keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }
          </style>
        <title>Wilmu Sound Store</title>
    	<meta charset="utf-8" />
    </head>
    <h2>Contact Us</h2>
    
<?php

    include('MusicStoreV1_style.css');
    if(isset($_POST['submitBTN']))
    {
        
    }

?>

	<div>       
        <div id="snackbar">THANK YOU FOR YOUR INPUT!</div>
        
        <script>
            function myFunction() {
                var x = document.getElementById("snackbar")
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        </script>
	</div>
     <div class="container">
          <form action="/action_page.php">
        
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
        
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        
            <label for="country">Country</label>
            <select id="country" name="country">
              <option value="canada">Canada</option>
              <option value="usa">USA</option>
            </select>
        
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
          </form>
         <button onclick="myFunction()">SUBMIT</button>
    </div> 
