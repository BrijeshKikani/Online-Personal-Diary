<?php


?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>My images</title>
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
    .img{
        object-fit: cover;
        object-position: center;
        width: 200px;
        height: 200px;
        border-radius: 25px;
        border: 2px solid green;
        margin: 5px;
    }
    .imgfield{
        margin-left: 35%;
        margin-top: 10px;
        margin-bottom: 10px;
        color: blue;
    }
    .addimage{
        border: 2px;
        border-radius: 4px;
        background-color: blue;
        color: #fff;
        width: 100px;
        cursor: pointer;
        padding: 3px;
    }
    
.active {
    background-color: green;
    color: white;
}

</style>
</head>

<body style="background-image:url(bg.jpg);background-size:100% 100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="mydiary.php">Diary</a></li>
		<li><a href="todo.php">To Do List</a></li>
        <li><a href="myimage.php" class="active">My Image</a></li>
<!--        <li><a href="favourite.php">Favourites</a></li>-->
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
        </ul>
       
	
</div>
</header>
 <form method="post" enctype="multipart/form-data" >
            <input type="file" name="image" class="imgfield">
            <button type="submit" name="submit" class="addimage">Add Image</button>
        </form>
<?php
    session_start();
   if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
       exit();}
    if(isset($_POST['submit'])){
       // session_start();
        if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
            echo "failed";
        }
        else{
            $name = addslashes($_FILES['image']['name']);
            $image =base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
            saveimage($name,$image);
        }
    }
    function saveimage($name,$image){
        //include 'includes/dbh.inc.php';
                $conn = mysqli_connect("localhost","root","","loginsystem");

        $user_uid=$_SESSION['u_uid'];

    $sqli="SELECT * FROM images where user_uid='$user_uid'";
    $result =mysqli_query($conn,$sqli);
        $sql = "INSERT INTO images(user_uid,image,name) VALUES('$user_uid','$image','$name')";
        $query = mysqli_query($conn,$sql);
        if(!$query){
            echo "Not Uploaded";
        }
        
    }
    display();
 function display(){
        //include 'includes/dbh.inc.php';
      $conn = mysqli_connect("localhost","root","","loginsystem");
        $user_uid=$_SESSION['u_uid'];
        $sql =" SELECT * FROM images WHERE user_uid='$user_uid'";
       $query = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($query);
        for($i=0;$i<$num;$i++){
            $result = mysqli_fetch_array($query);
            $img = $result['image'];
            echo '<img class="img" src="data:image;base64,'.$img.'">';
        }
    }       
    ?>
	
</body>
</html>








