<?php
   ob_start();
   session_start();

?>

<html lang = "en">
   
   <head>
      <title>Wilmu Sound Store/Login</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            position: relative;
            top: 12px;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
         }
         
         .form-signin input[type="password"] {
            position: relative;
            top: 10px;
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
         }
         
            .form-signin button {
            position: relative;
            top: 45px;
            left: -220px;
            
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Account</h2> 
      <div class = "container form-signin">
         
  	 <?php
         
     include('MusicStoreV1_style.css');
     
        $msg = '';
        
        if (isset($_POST['login']) && !empty($_POST['username']) 
           && !empty($_POST['password'])) {
			
           if ($_POST['username'] == '' && 
              $_POST['password'] == '') {
              $_SESSION['valid'] = true;
              $_SESSION['timeout'] = time();
              $_SESSION['username'] = 'tutorialspoint';
              
              echo 'You have entered valid use name and password';
           }else {
              $msg = 'Wrong username or password';
           }
        }
    ?>
    
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
         
      </div> 
      
   </body>
</html>