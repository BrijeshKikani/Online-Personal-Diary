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
<title>Diary</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    *{
        margin: 0px;
        padding: 0px;
    }
.navbar {
    overflow: hidden;
    font-size:30px;
	background-color: none;
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
    float: none;
    color: black;
    padding: 4px 8px;
    text-decoration: none;
    text-align: left;
	border-radius: 25px;
}
a:hover {
    background-color: blue;
}
.bgimg{
	background-image:url(back.jpg);
	}
    .newentry{
        margin-top: 5px;
        margin-bottom: 5px;
        margin-left: 40%;
        color: #fff;
        font-size: 25px;
    }
    .newentry a{
        color: #fff;
        padding: 7px;
    } 
    .block{
        width: 190px;
        background-color: #fff;
        height: 250px;
        display: block;
        margin: 7px;
        float: left;
        border: 2px solid green;
        color: #004d99;
        text-align: center;
        border-radius: 15px;
    }
    .block label{
        font-weight: 500;
        font-size: 0.9em;
        text-transform: uppercase; 
    }
    .block input[type="text"]{
        border: 1px solid #b3d9ff;
        border-radius: 4px;
        color: blue;
        width: 180px;
        text-align: center;
        margin-bottom: 10px;
        font-size: .8em;
    }
    .block input[type="date"]{
        border: 1px solid #b3d9ff;
        border-radius: 4px;
        color: blue;
    }
    textarea{
        margin-bottom: 1px;
    }
</style>

</head>

<body style="background-image:url(bg.jpg);background-size:100% 100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	   	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="mydiary.php" class="active">Diary</a></li>
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

</header>
<br>
    <ul><li class="newentry"><a href="newentry.php">New Entry</a></li></ul><br><br><br>
<div class="tabledisplay">
    <?php
    while($record=mysqli_fetch_assoc($result)){
               echo "<div class='block'><label>Diary Title</label> <input type='text' value=".$record['diary_title']." readonly><br>";
                     echo "<label>Diary date</label> <input type='text' value=".$record['diary_date']." readonly><br>";
             echo "<label>Diary Category</label> <input type='text' value=".$record['diary_category']." readonly><br>";
             echo "<label>Diary Content</label> <textarea rows='5' col='50' >".$record['diary_content']."</textarea>
             </div>";
            
            }
            
            ?>
    </div>   
</body>
</html>
