
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Thêm danh mục</li>
			</ol>
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
                                    $ID = $_POST['cat_name'];
                                    $query = mysqli_query($conn,"SELECT * FROM category where cat_name = '$ID' ");
                                    $num = mysqli_num_rows($query);
                                    if($num > 0){
                                        $error = "Danh mục đã tồn tại !";
                                    }        
                                    else 
                                    {

                                        $add_cat = "INSERT INTO category (cat_name) VALUES ('$ID')";
                                        $query_add = mysqli_query($conn,$add_cat);
                                        $error = "Them thanh cong";
                                        header("location:index.php?page_layout=category");
                                    }
                                }
        ?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm danh mục</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                        <div <?php
					           if(isset($error)){ ?> class="alert alert-success">
                                <?php 
						           echo $error;
					            }
					            ?></div>
                            <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input required type="text" name="cat_name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
