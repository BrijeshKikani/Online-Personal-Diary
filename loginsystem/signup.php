<?php   
    session_start();
        $a=rand(1,50);
        $b=rand(1,50);
    $realanswer=0;
$realanswer=$a+$b;
$_SESSION["answer"]=$realanswer;

?>
<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        
    </head>
    
    <body class="body">
            <img src="logogo.png" height="20%" width="100%">
            <div class="wrapper">
                <fieldset class="fieldsetalign"> 
                    <legend>SIGN UP</legend>
                <form action="includes/signup.inc.php" method="POST">
                    <table class="tableset">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>                           
                            <tr>
                                <td><label for="fname">First Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="text" id="fname" name="fname" placeholder="Firstname" required></td>
                            </tr>
                            <tr>
                                <td><label for="lname">Last Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="text" id="lname" name="lname" placeholder="Lastname" required></td>
                            </tr>
                            <tr>
                                <td><label for="Uname">User Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="text" id="Uname" name="uid" placeholder="Username" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email-ID</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="email" id="email" name="email" placeholder="Email-ID" required></td>
                            </tr>
                            <tr>
                                <td><label for="pwd">Password</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="password" id="pwd" name="pwd" placeholder="Password" required></td>
                            </tr>
                            <tr>
                                <td><label for="secCheck"><?php echo $a. " + " .$b ;?></label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><input type="text" id="secCheck" name="ans" placeholder="Answer" required></td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" style="width:100px;">Submit</button></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </fieldset>
            </div>
        
    
    </body>
</html>