
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
$sql_check = "SELECT * FROM user WHERE user_id = $del AND user_level = 1";
$query_check = mysqli_query($conn,$sql_check);
$num = mysqli_num_rows($query_check);
if($num>0){
    $error_del = "Khong xoa duoc";
}
else {
$sql_del = "DELETE FROM user WHERE user_id = $del " ;
$query_del = mysqli_query($conn,$sql_del);
}
header('location:index.php?page_layout=user');
}
?>
