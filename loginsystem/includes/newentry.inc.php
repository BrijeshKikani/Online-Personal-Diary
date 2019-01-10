<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
if(isset($_POST['add'])){
    
    include_once 'dbh.inc.php';
    
    $user_uid=$_SESSION['u_uid'];
     $title=mysqli_real_escape_string($conn,$_POST['title']);
     $date= date("Y/m/d");
    $category=mysqli_real_escape_string($conn,$_POST['category']);
     $newentry=mysqli_real_escape_string($conn,$_POST['newentry']);
    if(empty($newentry)){
        header("Location: ../newentry.php?newentry=emptytextarea");
        exit();
    }
    $sql = "INSERT INTO diary (user_uid,diary_title,diary_date,diary_category,diary_content) VALUES ('$user_uid','$title','$date','$category','$newentry');";
                        
                        mysqli_query($conn, $sql);
                        header("location: ../newentry.php?Newentry=success");
                        exit();
}
}
?>