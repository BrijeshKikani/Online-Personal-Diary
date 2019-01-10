<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
if(isset($_POST['submit'])){
    include_once 'includes/dbh.inc.php';
    $task = $_POST['task'];
    $user_uid = $_SESSION['u_uid'];
    $sql = "INSERT INTO todolist (user_uid,task) VALUES ('$user_uid','$task');";
    mysqli_query($conn,$sql);
    header("Location: todo.php?Newtask=added");
    
   
}
include_once 'includes/dbh.inc.php'; 
$user_uid = $_SESSION['u_uid'];
$sqlview = "SELECT * FROM todolist WHERE user_uid = '$user_uid'";
$results = mysqli_query($conn,$sqlview);

if(isset($_GET['del_task'])){
    $task = $_GET['del_task'];
    mysqli_query($conn,"DELETE FROM todolist where task='$task'");
    header("Location: todo.php?delete=success");
    exit();
}
}
    
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <style>
 *{
    margin: 0px;
     padding: 0px;
     box-sizing: border-box;
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

.header {
  background-color: none;
  padding: 30px 40px;
  color: black;
  text-align: center;
}

.header:after {
  content: "";
  display: table;
  clear: both;
}

input {
  border: none;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

.addBtn {
  padding: 10px;
  width: 15%;
  background:yellow;
  color: #555;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
    border-radius: 25px;
    float: left;
    border: none;
}
            .alert{
                color: red;
            }
.active {
    background-color: green;
    color: white;
}

.addBtn:hover {
  background-color: red;
}
/*    #######table-styling######        */
table{
    width: 30%;
    margin: 15px 310px;
    border-radius: 10px;
}

tr{
    border: 1px solid #fff;
    color: #fff;
}
th{
     border: 1px solid #fff;
    font-size: 20px;
    color: #fff;
}
th,td{

    border:none;
    height: 30px;
    padding: 2px;
}
.task{
    text-align: center;
    font-size: 20px;
    color: #fff;
}
.delete{
    text-align: center;                
}
.delete a{
    color: #fff;
    background: #a52a2a;
    padding: 2px 7px;
    text-decoration: none;

}
            .logo{
                width: 100%;
                height: 25%;
            }


 </style>    
</head>
   <body style="background-image:url('bg.jpg');background-size:100%;">

<header>
        	<img src="logogo.png" style="height:133px;overflow:hidden;width:100%;">

	<div class="navbar">
	   	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="mydiary.php">Diary</a></li>
		<li><a href="todo.php" class="active">To Do List</a></li>
        <li><a href="myimages.php">My Image</a></li>
<!--        <li><a href="favourite.php">Favourites</a></li>-->
        
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
        </ul>
	</div>
       <div class="header" style="margin-left:20%;margin-right:20%;">
        <h2 style="margin:5px">My To-Do List</h2>
        <form method="post" action="todo.php">
        <input type="text" style="border-radius: 25px;" placeholder="Title..." name="task" required>
           <button class="addBtn" name="submit">Add</button>
           </form>
       </div>
    <table>
        <thead>
            <tr>
            <th>Task</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($record = mysqli_fetch_array($results)){?>
            <tr>
                <td class="task"><?php echo $record['task']; ?></td>
                <td class="delete"><a href="todo.php?del_task=<?php echo $record['task'];?>">x</a></td>
            </tr>
            <?php } ?>
        </tbody> 
    
    
    </table>
    </header>
    </body>
</html>