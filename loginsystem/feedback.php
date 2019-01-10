<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
    if(isset($_POST['submit'])){
     include 'includes/dbh.inc.php';
        $user_uid=$_SESSION['u_uid'];
        $feedback= mysqli_real_escape_string($conn,$_POST['feedback']);
          if(empty($feedback)){
        header("Location: feedback.php?feedback=emptytextarea");
        exit();
          }
        $sql = "INSERT INTO feedback (user_uid,feedback) VALUES('$user_uid','$feedback');";
         mysqli_query($conn, $sql);
                        header("location: feedback.php?feedback=success");
                        exit();
    }
    
    }?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Feedback</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
<style>
body {margin:0;}
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

a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	border-radius: 25px;
}
a:hover {
    background-color: #ddd;
}
.bgimg{
	background-image:url(back.jpg);
	}
	d{
color:red;
}
aaa{
font-size:15px;
}
#dv{
background-color:#d1d1d1;
height:50%;
width:80%;
padding-top:50px;
border-radius:5px;

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

#padding{
padding-left:50px;
}

input
{
border:1px solid black;
border-radius: 4px;
height:25px;
background-color:white;
}

textarea{
border:1px solid black;
border-radius: 4px;
height:80px;
width:80%;
background-color:white;
}


</style>
<script>
	function security() {
	var a=Math.floor(100000 + Math.random() * 900000);
	var b=a.toString();
	b="   " +b+"   ";
	document.getElementById("se_code").innerHTML = b;
	}	
</script>


</head>

<body onLoad="security();" style="background-image:url(bg.jpg);background-size:100% 100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	
		<a href="home.php">Home</a>
		<a href="mydiary.php">Diary</a>
		<a href="todo.php">To Do List</a>
		<a href="myimages.php">My Image</a>
        <a href="faq.php">FAQ</a>
		<a href="feedback.php" class="active">Feedback</a>
		<a href="aboutus.php">About Us</a>
         <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
	</div>

</header>
<br>
<br>
<form method="post" action="feedback.php">
<fieldset style="width:50%; border: 3.5px solid #4CAF50;height:50%;border-radius: 25px;margin-left:25%;">
<legend style="font-size:35px;color:#333;">Feedback-Form</legend>
	<center>
	<div id="dv">
	<table width="100%" style="border-spacing: 10px;margin-left:10%;color:#000000;">
	
	<tr>
	<td valign="top">Feedback :   <d>*</d></td>
	<td><textarea size="50" placeholder="Feedback" id="add" style="padding-left:4px;" name="feedback"></textarea></td>
	</tr>
<!--
	<tr>
	<td>Enter Secure code :   <d>*</d></td>
	<td valign="middle">
	<pt id="se_code" style="float:left;background-color:#4CAF50;margin-right:6px;padding:3px;color:white;">000000</pt>
	<input type="text"  size="25" placeholder="Enter code" id="code"  style="width:25%;padding-left:4px;"/>
-->
<!--	<img src="refresh.png" height="25" onclick="security()" align="top">-->
	
	</table>
	<center>
		<button id="button" type="submit" name="submit">Submit</button>
	</center>
	</div>
	</center>

<d>*</d><aaa>Required field</aaa>
</fieldset>
</form>


	
</body>
</html>
