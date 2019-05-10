<?php 
$id = $_GET['id'];
$sql_edit = "SELECT * from category where cat_id = $id";

$query_edit = mysqli_query($conn,$sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
if(isset($_POST['sbm'])){
    $name = $_POST['cat_name1'];
    $sql_edit1 = "UPDATE category SET cat_name = '$name' where cat_id = $id ";
    $sql_check1 = "SELECT * FROM category where cat_name = '$name' " ;
    $query_check1= mysqli_query($conn,$sql_check1);
    $num1 = mysqli_num_rows($query_check1);
    
    if($num1 >0){
        $error = "Danh mục đã bị trùng";
    }
    else {
        $query_edit = mysqli_query($conn,$sql_edit1);
    header("location:index.php?page_layout=category") ;   }
}
?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
                <li class="active"><?php echo $row_edit['cat_name']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:<?php echo $row_edit['cat_name']; ?></h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                        <div <?php
					           if(isset($error)){ ?> class="alert alert-danger">
                                <?php 
						           echo $error;
					            }
					            ?></div>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="cat_name1" required value="<?php echo $row_edit['cat_name']; ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
