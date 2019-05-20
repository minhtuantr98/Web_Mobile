
    <?php 
  session_start();
  if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    define('TEMPLATE', true);
    include_once('../config/connect.php');
    if(isset($_GET['id'])){
        $del = $_GET['id'];
        $sql_check = "SELECT * FROM product WHERE prd_id = $del AND prd_status = 1 ";
        $query_check = mysqli_query($conn,$sql_check);
        $num = mysqli_num_rows($query_check);
        if($num>0){
            $error_del = "Khong xoa duoc";
        }
        else {
        $sql_del = "DELETE FROM product WHERE prd_id = $del " ;
        $query_del = mysqli_query($conn,$sql_del);
        }
        header('location:index.php?page_layout=product');
        }
  }
?>

