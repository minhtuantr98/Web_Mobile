<?php 
$id = $_GET['id'];
$sql_edit = "SELECT * from user where user_id = $id";

$query_edit = mysqli_query($conn,$sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
if(isset($_POST['sbm'])){
    $mail1 = $_POST['user_mail'];
    $query_check = mysqli_query($conn,"SELECT * FROM user where user_mail = '$mail1' ");
    $num_check = mysqli_num_rows($query_check);
    if($num_check > 0){
        $error = "Email da bi trung";
    }        
    else {
        $name = $_POST['user_full'];
        $mail = $_POST['user_mail'];
        $pass = $_POST['user_pass'];
        $level = $_POST ['user_level'];
        $sql_update ="UPDATE user SET user_full = '$name' , user_mail = '$mail',user_pass= '$pass',user_level = $level where user_id =$id";

        $query_update= mysqli_query($conn,$sql_update);
        header("location:index.php?page_layout=user");
    }
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active"><?php echo $row_edit['user_full'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row_edit['user_full'] ?></h1>
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
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_full" required class="form-control" value="<?php echo $row_edit['user_full'] ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" required value="<?php echo $row_edit['user_mail'] ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1 <?php if($row_edit['user_level']==1) {echo "selected";} ?> >Admin</option>
                                        <option value=2 <?php if($row_edit['user_level']==2) {echo "selected";} ?> >Member</option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
