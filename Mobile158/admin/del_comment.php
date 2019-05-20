<?php 
$conn = mysqli_connect('localhost','root','','mobile_158');
if($conn){
    $sql = "SET NAMES 'utf8' ";
    $query = mysqli_query($conn,$sql);
}
else {
    echo " Ket noi khong thanh cong";
}
if(isset($_GET['id'])){
$del = $_GET['id'];
$sql_del = "DELETE FROM comment WHERE comm_id = $del " ;
$query_del = mysqli_query($conn,$sql_del);
}
header('location:index.php?page_layout=comment');
?>

