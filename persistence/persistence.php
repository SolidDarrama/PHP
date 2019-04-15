<?php
#Updated by Jose Guadarrama

# I'm going to silence warnings for you... you will gerate a ton of them.
# If you are having problem with your code, comment this line out so you can see the warnings.

//error_reporting(E_ALL ^ E_WARNING);

error_reporting(E_ALL & ~E_NOTICE); //NOTE: There was a constant 'Notice: Undefined index....' being output for the empty
#sessions/cookies variables, i toggled the notices off. The sessions, and cookies function fine after inputting values.
#I also read on the assignment's instructions, on blackboard that "The application throws no errors (warnings are okay)",
#assuming the Notice-Warning falls into that exception.

# First thing you need to do it start the session, this should alwasy be done first.
# test no e

session_start();

# Next, get whatever is currently in the session so you can spit out on the page
$session_data = $_SESSION;

# Next, get whatever is currently in the cookies so you can spit out on the page
$cookie_data = $_COOKIE;

# Next, you need to see if the form has posted data to this page
if(!empty($_POST)){

    # Now you need to check to see if the check boxes are checked
    if (isset($_POST['save_in_session'])){

    	# If you got this far, then you need to save the rest of the form data into the session
       if (isset($_POST['name']) ? $_POST['name'] : NULL){
            $_SESSION['name'] = $_POST['name'];
            }
       if (isset($_POST['street']) ? $_POST['street'] : NULL){
            $_SESSION['street'] = $_POST['street'];
            }
       if (isset($_POST['city']) ? $_POST['city'] : NULL){
            $_SESSION['city'] = $_POST['city'];
            }
       if (isset($_POST['state']) ? $_POST['state'] : NULL){
            $_SESSION['state'] = $_POST['state'];
            }
       if (isset($_POST['zip']) ? $_POST['zip'] : NULL){
            $_SESSION['zip'] = $_POST['zip'];
            }
       if (isset($_POST['phone']) ? $_POST['phone'] : NULL){
            $_SESSION['phone'] = $_POST['phone'];
            }
       if (isset($_POST['email']) ? $_POST['email'] : NULL){
            $_SESSION['email'] = $_POST['email'];
            }
    }

    if (isset($_POST['save_cookie'])){

    	# If you got this far, then you need to save the rest of the form data into cookies
       if (isset($_POST['name']) ? $_POST['name'] : NULL){
            setcookie("name", $_POST['name']);
            }
       if (isset($_POST['street']) ? $_POST['street'] : NULL){
            setcookie("street", $_POST['street']);
            }
       if (isset($_POST['city']) ? $_POST['city'] : NULL){
            setcookie("city", $_POST['city']);
            }
       if (isset($_POST['state']) ? $_POST['state'] : NULL){
            setcookie("state", $_POST['state']);
            }
       if (isset($_POST['zip']) ? $_POST['zip'] : NULL){
            setcookie("zip", $_POST['zip']);
            }
       if (isset($_POST['phone']) ? $_POST['phone'] : NULL){
            setcookie("phone", $_POST['phone']);
            }
       if (isset($_POST['email']) ? $_POST['email'] : NULL){
            setcookie("email", $_POST['email']);
            }
        header('Location: '.$_SERVER['REQUEST_URI']); //using this line of code, because it took two clicks on (the button) submit/cookies for it to function
    }    
}

if (isset($_POST['reset_session'])) //function for the Button - Reset Sessions
    { 
       session_destroy();
       header('Location: '.$_SERVER['REQUEST_URI']); //using this line of code, because it took two click on (the button) Reset Sessions for it to function
    }  

if (isset($_POST['reset_cookie'])) //function for the Button - Reset Sessions
    { 
            setcookie("name", '',time() - 3600);
            setcookie("street",'', time() - 3600);
            setcookie("city", '',time() - 3600);
            setcookie("state",'', time() - 3600);
            setcookie("zip", '',time() - 3600);
            setcookie("phone",'', time() - 3600);
            setcookie("email",'', time() - 3600);

            header('Location: '.$_SERVER['REQUEST_URI']); //using this line of code, because it took two click on (the button) Reset Cookies for it to function

     }  

if (isset($_POST['delete_all'])) //function for the Button - Delete All
    { 
            if (isset($_SERVER['HTTP_COOKIE'])) {
                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                foreach($cookies as $cookie) {
                    $parts = explode('=', $cookie);
                    $name = trim($parts[0]);
                    setcookie($name, '', time()-1000);
                    setcookie($name, '', time()-1000, '/');
                }
        }

        header('Location: '.$_SERVER['REQUEST_URI']); //using this line of code, because it took two click on (the button) Delete All for it to function

    }  
# Now that you have saved what you needed to, spit it out on the session and cookie data below. 
# There are already placeholders for the data.

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>My Phone Book</title>
    </head> 
    <body>
    	<h1>Data persistence with Sessions and Cookies</h1>
        <hr>
        <div>
            <h2>Enter new information</h2>
            <form action='#' method="post">
                <table border="0" width="">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Street:</td>
                        <td><input type="text" name="street"></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><input type="text" name="city"></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td><input type="text" name="state"></td>
                    </tr>
                    <tr>
                        <td>Zip:</td>
                        <td><input type="text" name="zip"></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><input type="text" name="phone"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                </table>
                <label>Save in Session: <input name="save_in_session" type="checkbox" value="1"></label>
                <br>
                <label>Save Cookie: <input name="save_cookie" type="checkbox" value="1"></label>
                <br>
                <input type="submit" value="submit"/>
                <input type="submit" name="reset_session"  value="Reset Sessions">
                <input type="submit" name="reset_cookie"  value="Reset Cookies">
                <input type="submit" name="delete_all"  value="Delete All">
            </form>
        </div> 
        <hr>
        <div id="" class="" style="float:left; width:50%;">
            <h2>Information in Session</h2>
            <table border="0" width="">
                <tr>
                    <td>Name:</td>
                    <td> <?php print $_SESSION['name'];  ?></td>
                </tr>
                <tr>
                    <td>Street:</td>
                    <td><?php print $_SESSION['street']; ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><?php print $_SESSION['city']; ?></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><?php print $_SESSION['state']; ?></td>
                </tr>
                <tr>
                    <td>Zip:</td>
                    <td><?php print $_SESSION['zip']; ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php print $_SESSION['phone']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php print $_SESSION['email']; ?></td>
                </tr>
            </table>
        </div> 
		<div id="" class="" style="float:left; width:50%;">
            <h2>Information in Cookies</h2>
            <table border="0" width="">
                <tr>
                    <td>Name:</td>
                    <td><?php print $_COOKIE['name'];  ?></td>
                </tr>
                <tr>
                    <td>Street:</td>
                    <td><?php print $_COOKIE['street'];  ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><?php print $_COOKIE['city'];  ?></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><?php print $_COOKIE['state'];  ?></td>
                </tr>
                <tr>
                    <td>Zip:</td>
                    <td><?php print $_COOKIE['zip'];  ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php print $_COOKIE['phone'];  ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php print $_COOKIE['email'];  ?></td>
                </tr>
            </table>
        </div>
        <div style="clear:both"></div>
    </body> 
</html> 
