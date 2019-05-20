<?php 
$id = $_GET['id'];
$sql_edit = "SELECT * from comment where comm_id = $id";

$query_edit = mysqli_query($conn,$sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
if(isset($_POST['sbm'])){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $details = $_POST['details'];
    $sql_edit1 = "UPDATE comment SET comm_name = '$name',comm_mail = '$mail',comm_details = '$details'  where comm_id = $id ";   
    mysqli_query($conn,$sql_edit1);
    header("location:index.php?page_layout=comment");
}
?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý bình luận</a></li>
                <li class="active"><?php echo $row_edit['comm_id']; ?></li>
			</ol>
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
                                <label>Người Bình Luận:</label>
                                <input type="text" name="name" required value="<?php echo $row_edit['comm_name']; ?>" class="form-control" placeholder="Tên Người Bình Luận...">
                                <label>Email:</label>
                                <input type="text" name="mail" required value="<?php echo $row_edit['comm_mail']; ?>" class="form-control" placeholder="Email ng bình luận...">
                                <label>Chi Tiết Bình Luận:</label>
                                <input type="text" name="details" required value="<?php echo $row_edit['comm_details']; ?>" class="form-control" placeholder="Bình luận...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
