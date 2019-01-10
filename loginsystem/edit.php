<?php
session_start();
include 'includes/dbh.inc.php';
 $user_uid=$_SESSION['u_uid'];

    $sql="SELECT * FROM users where user_uid='$user_uid'";
    $result = mysqli_query($conn,$sql);

    $record = mysqli_fetch_assoc($result);
  
if(isset($_POST['submit'])){
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    if(!preg_match('/^\d{10}$/',$phone)){
        header("Location: edit.php?lengthofphoneno=invalid");
        exit();
    } 
       $sqlii = "DELETE FROM profile WHERE user_uid='$user_uid'";
    mysqli_query($conn,$sqlii);
      $sqli = "INSERT INTO profile (user_uid,user_phone,user_dob) VALUES ('$user_uid','$phone','$dob');";
    mysqli_query($conn,$sqli);
     header("location: home.php?changes=success");
    exit();
}

?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Home</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
<style>
    *{
        margin: 0px;
        padding: 0px;
    }
body {margin:0px;}
.navbar {
    overflow: hidden;
    font-size:30px;
	background-color: none;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active {
    background-color: green;
    color: white;
}

.navbar a:hover {
    background-color: black;
}

li{
    float: left;
    list-style: none;
    padding: none;
    margin: 0px;
}
a {
    
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	border-radius: 25px;
}
.logout{
    border-radius: 25px;
    float: right;
    margin-top: 12px; 
    padding: 5px;
    background-color: black;
    color: #fff;
    border-color: black;
    cursor: pointer;   
}
    input{
        width: 200px;
    border: 1px solid green;
        border-radius: 7px;
        margin: 4px;
        padding: 2px;
        font-size: 14px;
    }
    label{
        font-size: 18px;
        margin-left: 10px;
        color: #fff;
    }
a:hover {
    background-color: black;
}
.bgimg{
	background-image:url(back.jpg);
	}

.fieldsetalign{
    border-radius: 25px; 
    margin-left: 25%;
    margin-right: 25%;
    padding-bottom: 10px;
    border: 3.5px solid #4CAF50;
}
legend{
    font-size: 35px;
    color:#fff;
    padding: 7px;
    margin-left: 8px;
}
    button{
        margin-left: 10px;
        border: 1px blue;
        background: blue;
        color: #fff;
        border-radius: 5px;
    }
    
</style>
<script>
//	function validation(){
//        var m=document.forms["myform"]["mobile"].value;
//        if(m.length!=10)
//            {
//                alert("Enter 10 digit mobile number");
//            }
//    }
</script>


</head>

<body style="background-image:url(bg.jpg);background-size:100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	<ul>
        <li><a href="home.php" class="active">Home</a></li>
        <li><a href="mydiary.php">Diary</a></li>
		<li><a href="todo.php">To Do List</a></li>
        <li><a href="myimages.php">My Image</a></li>
        
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
        </ul>
	</div>
    <div>
        <fieldset class="fieldsetalign">
            <legend>Profile</legend>
        <form method="post" action="edit.php" name="myform">
            <table class="tableset">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo "
                            <tr>
                                <td><label for='fname'>First Name</label></td>
                                <td><input type='text' id='fname' name='fname'  value=
                                ".$record['user_first']."></td>
                            </tr>";?>
                            <?php echo "
                            <tr>
                                <td><label for='lname'>Last Name</label></td>
                                <td><input type='text' id='lname' name='lname'  value=
                                ".$record['user_last']."></td>
                            </tr>";?>
                            <?php echo "
                            <tr>
                                <td><label for='uname'>User Name</label></td>
                                <td><input type='text' id='uname' name='uname'  value=
                                ".$record['user_uid']."></td>
                            </tr>";?>
                           <?php echo "
                            <tr>
                                <td><label for='email'>Email-ID</label></td>
                                <td><input type='text' id='email' name='email'  value=
                                ".$record['user_email']."></td>
                            </tr>";?>
                             <tr>
                                <td><label for="dob">Birth Date</label></td>
                                <td><input type="date" id="dob" name="dob" ></td>
                            </tr>
                           <tr>
                                <td><label for="phone">Contact-No.</label></td>
                                <td><input type="text" id="phone" name="phone" placeholder="Contact-No." maxlength="10"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" style="width:100px;">Save Changes</button></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
        
        </form>
        </fieldset>
    </div>
    
</header>
</body>
</html>
