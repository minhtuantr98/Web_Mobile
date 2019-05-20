<?php 
session_start();
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
if(count($_SESSION['cart']) == 0){
	unset($_SESSION['cart']);
}

header('location:../../index.php?page_layout=cart');

?>