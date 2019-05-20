
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
			</div>
        </div><!--/.row-->
        <?php
                                if(isset($_POST['sbm'])){
                                    $conn = mysqli_connect('localhost','root','','mobile_158');
                                    if($conn){
                                        $sql = "SET NAMES 'utf8' ";
                                        $setname = mysqli_query($conn,$sql);
                                    }
                                    else {
                                        echo "Ket noi khong thanh cong";
                                    }
                                    $ID = $_POST['user_mail'];
                                    $query = mysqli_query($conn,"SELECT * FROM user where user_mail = '$ID' ");
                                    $num = mysqli_num_rows($query);
                                    if($num > 0){
                                        $error = "Email da bi trung";
                                    }        
                                    else 
                                    {
                                        $Hoten = $_POST['user_full'];
                                        $Matkhau =$_POST['user_pass'];
                                        if($_POST['user_level'] == 1)
                                        {
                                            $Level = 1;
                                        }
                                        else{
                                            $Level = 2;
                                        }
                                        $add_user = "INSERT INTO user (user_full, user_mail,user_pass,user_level) VALUES ('$Hoten','$ID','$Matkhau',$Level)";
                                        $query_add = mysqli_query($conn,$add_user);
                                        $error = "Them thanh cong";
                                        header("location:index.php?page_layout=user");
                                    }
                                }
        ?>
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
                                    <input name="user_full" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
