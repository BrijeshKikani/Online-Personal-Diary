<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
    include 'includes/dbh.inc.php';
        $user_uid=$_SESSION['u_uid'];

    $sql="SELECT * FROM diary where user_uid='$user_uid'";
    $result =mysqli_query($conn,$sql);
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
a:hover {
    background-color: black;
}
.bgimg{
	background-image:url(back.jpg);
	}

.greeting{
   color:#fff;
   font-size:25px;
   text-align: center;
    margin:4px;
    }
</style>
<script>
	
</script>


</head>

<body style="background-image:url(bg.jpg);background-size:100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	<ul>
        <li><a href="home.php">Home</a></li>
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
    <div class="greeting">
    <?php
         if(isset($_SESSION['u_id'])){
        echo  $_SESSION['u_first']. " Welcome";
    }   ?>
    </div>

</header>
</body>
</html>