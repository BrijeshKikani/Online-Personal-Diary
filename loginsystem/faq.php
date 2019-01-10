<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
    exit();
}
?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>FAQ</title>
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

</style>
<script>
	
</script>


</head>

<body style="background-image:url(bg.jpg);background-size:100% 100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	
		<a href="home.php">Home</a>
        <a href="mydiary.php">Diary</a>
		<a href="todo.php">To Do List</a>
		<a href="myimages.php">My Image</a>
<!--		<a href="favourite.php">Favourites</a>-->
		<a href="faq.php" class="active">FAQ</a>
		<a href="feedback.php" class="acive">Feedback</a>
		<a href="aboutus.php">About Us</a>
         <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
 
	</div>

</header>
    <div class="faq">
<a href="faq1.php" style="color:white;">1.What cost to use this site?</a>
<a href="faq2.php" style="color:white;">2.How do I know my information is secure?</a>
<a href="faq3.php" style="color:white;">3.Are there any prohibited content types that cannot be posted on MyDiary.com?</a>
<a href="faq4.php" style="color:white;">4.Who can use my details?</a>
<a href="faq5.php" style="color:white;">5.What types of files can I upload?</a>
<a href="faq6.php" style="color:white;">6.Is there a size limitation to the files I upload?</a>
<a href="faq7.php" style="color:white;">7.How do I contact MyDiary.com if I have questions concerning my account?</a>


	
</body>
</html>
