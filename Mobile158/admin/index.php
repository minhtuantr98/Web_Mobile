<?php
session_start();
define('TEMPLATE', true);
include_once('../config/connect.php');
// if(empty($_SESSION['mail'])){
// 		if(isset($_COOKIE['id']) && isset($_COOKIE['pass'])){
//             $id=$_COOKIE['id'];
//             $pass=$_COOKIE['pass'];
// 			$sql2="SELECT * from user where user_mail='$id' and user_pass='$pass'";

// 			$query = mysqli_query($conn,$sql2);

// 			if($query){
// 				include('admin.php');
// 			}
// 		}
// }

// if(isset($_COOKIE['id']) && isset($_COOKIE['pass'])){
//     include('admin.php');
// }
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    $id = $_SESSION['mail'] ;
    $pass =$_SESSION['pass'];
    $sql_check="SELECT * from user where user_mail= '$id' and user_pass ='$pass'";
    $query_check = mysqli_query($conn,$sql_check);
    $row_check = mysqli_fetch_array($query_check);
    if($row_check['user_level'] == 1){
             include('admin.php');
    }
    else {
        header("location:../index.php");
    }
} 
else{
    include('login.php');
}
?>