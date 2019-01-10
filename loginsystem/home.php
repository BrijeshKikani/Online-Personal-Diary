<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
include 'includes/dbh.inc.php';
 $user_uid=$_SESSION['u_uid'];

    $sql="SELECT * FROM users where user_uid='$user_uid'";
    $sqli="SELECT * FROM profile where user_uid='$user_uid'";
    $result = mysqli_query($conn,$sql);
    $resulti = mysqli_query($conn,$sqli);
    $record = mysqli_fetch_assoc($result);
    $recordi = mysqli_fetch_assoc($resulti);
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
      button { 
        margin-left: 11px;
        border: 1px blue;
        background: blue;
        color: #fff;
          margin-bottom: 7px;
        border-radius: 5px;
    }
    button a{
        color: #fff;
        text-decoration: none;
    }
      input{
        width: 200px;
    border: 1px solid green;
        border-radius: 7px;
        margin: 4px;
        padding: 2px;
        font-size: 14px;
          margin-left: 10px;
    }
    label{
        font-size: 18px;
        margin-left: 10px;
        color: #fff;
    }
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
.a {
    
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
.a a:hover {
    background-color: black;
}
.bgimg{
	background-image:url(back.jpg);
	}

.fieldsetalign{
    border-radius: 25px; 
    margin-left: 25%;
    margin-right: 25%;
    border: 3.5px solid #4CAF50;
}
legend{
    font-size: 35px;
    color:#fff;
    padding: 7px;
    margin-left: 8px;
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
        <li><a href="home.php" class="active a">Home</a></li>
        <li><a href="mydiary.php" class="a">Diary</a></li>
		<li><a href="todo.php" class="a">To Do List</a></li>
        <li><a href="myimages.php" class="a">My Image</a></li>
        
        <li><a href="faq.php" class="a">FAQ</a></li>
        <li><a href="feedback.php" class="a">Feedback</a></li>
        <li><a href="aboutus.php" class="a">About Us</a></li>
        <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
        </ul>
	</div>
    <div>
        <fieldset class="fieldsetalign">
            <legend>Profile</legend>
        <form method="post" action="home.php">
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
                             <?php echo "
                            <tr>
                                <td><label for='dob'>Birth Date</label></td>
                                <td><input type='date' id='dob' name='dob'  value=
                                ".$recordi['user_dob']." readonly></td>
                            </tr>";?>
                            <?php echo "
                            <tr>
                                <td><label for='phone'>Contact No.</label></td>
                                <td><input type='text' id='phone' name='phone'  value=
                             ".$recordi['user_phone']." readonly></td>
                            </tr>";?>
                            <tr>
                                <td><button type="submit" name="submit" style="width:100px;"><a href="edit.php">Edit Profile</a></button></td>
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
