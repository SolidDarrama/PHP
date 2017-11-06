<!DOCTYPE html>
    <html>
        <head>
        	<style>
        	     h2{
                    text-align: center;
                    color: #017572;
                   }
                body{
                       color: white;
                    }
        	</style>
          <title>Wilmu Sound Store</title>
        </head>
      <h2>Photos</h2> 
      
<?php 
    if(isset($_POST['upload'])){
        $file_name =  $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_Loc = $_FILES['file']['tmp_name'];
        $file_store = "upload/".$file_name;
        
        move_uploaded_file($file_tem_Loc, $file_store);
    }

    session_start();
    include('MusicStoreV1_style.css');
 ?>
 
    <body>
        <form action="?" enctype="multipart/form-data" method="post">
            <p><input type="file" name="file"/><p/>
            <p><input type="submit" name="upload" value="Upload Image"><p/>
         </form>
     </body>
 </html>
 
<?php 
    $folder = "upload/";
    if(is_dir($folder)){
        if($open = opendir($folder)){
            while(($file = readdir($open)) !=false){
                if($file =='.' || $file=='..') continue;
                echo ' <img src = "upload/'.$file.'" width="150" height=150>';
            }
            closedir($open);
        }
    }
?>