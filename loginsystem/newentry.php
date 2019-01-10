<?phpsession_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
    exit();
}
?>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>New Entry</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
<style>
body {margin:0;}
.navbar {
    overflow: hidden;
    font-size:30px;
	background-color: none;
}
    *{
        margin: 0px;
        padding: 0px;
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
#middle{
		margin-left:20%;
		}
		input{
		border:1px solid black;
		height:30px;
		
		border-radius:5px;
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
    
.active {
    background-color: green;
    color: white;
}

</style>
<script>
	
</script>


</head>


<body style="background-image:url(bg.jpg);background-size:100% 100%;">
<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	   	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="mydiary.php" claas="active">Diary</a></li>
		<li><a href="todo.php">To Do List</a></li>
        <li><a href="myimages.php">My Image</a></li>
        <li><a href="favourite.php">Favourites</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
        </ul>
		
	</div>

</header>
<div id="middle">
<h1 style="color:white;" style="float:left;">Create New Entry</h1>
    <form method="post" action="includes/newentry.inc.php">
<input type="text" placeholder="Enter Title" style="width:250px;" name="title">

<br>
<input type="text" value="<?php echo date("d-m-Y") ?>" name="date" readonly>
<k style="color:white;">Category:</k><select name="category" required style="border-radius: 12px;" >
        <option value="family">Family</option>
        <option value="friend">Friend</option>
		<option value="office">Office</option>
</select>
        <br><br>	
	<textarea name="newentry" maxlength="1000" rows="10" cols="100" style="border-radius: 12px;"></textarea>
	<br>	<br>
	<button type="submit" name="add"  style="border-radius: 12px;">Add Entry</button>
    </form>
	</div>
</body>
</html>
