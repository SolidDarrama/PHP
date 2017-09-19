<?php

# I'm going to silence warnings for you... you will gerate a ton of them.
# If you are having problem with your code, comment this line out so you can see the warnings.
//error_reporting(E_ALL ^ E_WARNING);

#update by Jose Guadarrama

# 1.) Open the file for reading

$myfile = fopen(__DIR__ . '/phonebook.dat', 'r');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>My Phone Book</title>
    </head> 
    <body>
    	<h1>Phone book</h1>
        <?php
        $count = 0;
            # 2.) Loop over each line of the file
        foreach(file('phonebook.dat') as $line) {
            $count++;
            $arrayX[$count] = $line. "\n";
            //echo $line;
            }


        //echo ($arrayX[1])['Street'];


        //print_r (unserialize($arrayX[2])); //example testing output

        # 3.) unserialize the data from that line
        # 4.) print it out below
        
        //$id = '19904';
        //foreach(file('phonebook.dat') as $link) {
        //        if ($link['Address']==$id) {
        //            $result = $link;
        //            echo $result;
        //            break;
        //        }
        //    }


        //foreach (file('phonebook.dat') as $palabra) {
        //    foreach ($palabra as $key=>$parto) {
        //        if (is_numeric($key)) {
        //            echo $parto['Street'] . "<br>";
        //        }
        //    }
        //}


        //echo $newList = array_combine(array_column($arrayX[1],'Street'),$arrayX[1]);


        //$search='Street';

        //$cluster=false;

        //foreach (file('phonebook.dat') as $n=>$c)
        //    if (in_array($search, $c)) {
        //        $cluster=$n;
        //        break;
        //    }

        //echo $cluster;



        for($counter = 1; $counter < 6; $counter++)
        {
            
        ?>

        <table border="0" width="">
            <tr>
                <td>Name:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Name'];  ?></td>
            </tr>
            <tr>
                <td>Street:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Address']['Street']; ?></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Address']['City']; ?></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Address']['State']; ?></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Address']['Zip']; ?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Phone']; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo (unserialize($arrayX[$counter]))['Email']; ?></td>
            </tr>
        </table>
        <hr>
        
        <?php
 
        } //end of the while loop

        # 5.) Now you can end your loop and close the file

        fclose($myfile);
        
        ?>
    </body> 
</html> 