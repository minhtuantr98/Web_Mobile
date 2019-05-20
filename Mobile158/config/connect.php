<?php
if(!defined('TEMPLATE'))
{
    die('Bạn không có quyền truy cập');
}
$conn =mysqli_connect('localhost','root','','mobile_158');
if($conn){
    mysqli_query($conn,"SET NAMES 'utf8' ");
} else {
    exit("K the ket noi toi My sql Sever");
}
?>