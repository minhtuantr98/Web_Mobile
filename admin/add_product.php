
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <?php 
         $conn = mysqli_connect('localhost','root','','mobile_158');
         if($conn){
             $sql = "SET NAMES 'utf8' ";
             $setname = mysqli_query($conn,$sql);
         }
         else {
             echo "Ket noi khong thanh cong";
         }
         if(isset($_POST['sbm'])){
             $name = $_POST['prd_name'];
             $price =$_POST['prd_price'];
             $warran = $_POST['prd_warranty'];
             $accsess = $_POST['prd_accessories'];
             $pro =$_POST['prd_promotion'];
             $new = $_POST['prd_new'];
             $cat = $_POST['cat_id1'];
             // up ảnh 
             $image = $_FILES['prd_image12']['name'];
             $image_tmp = $_FILES['prd_image12']['tmp_name'];

             if(isset($_POST['prd_featured']))
             {
                 $feature = $_POST['prd_featured'];
             }
             else {
                 $feature = 0 ;
             }
             $status = $_POST['prd_status'];
             $detail = $_POST['prd_details'];

             $add_product = "INSERT INTO product (prd_featured,prd_image,cat_id,prd_name, prd_price,prd_warranty,prd_accessories,prd_promotion,prd_new,prd_status,prd_details) 
             VALUES ($feature,'$image',$cat,'$name',$price,'$warran','$accsess','$pro','$new',$status,'$detail')";
            
             $query_add = mysqli_query($conn,$add_product);
             move_uploaded_file($image_tmp,'products/'.$image);
             header("location:index.php?page_layout=product");

             if($query_add){
                 $error ="Bạn thêm thành công";
             }
             else {
                 echo "Bạn thêm thất bại";
             }
             
         }
        ?>
        <div <?php
					           if(isset($error)){ ?> class="alert alert-success">
                                <?php 
						           echo $error;
					            }
					            ?></div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data"> 

                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input required name="prd_accessories" type="text" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input required name="prd_image12" type="file">
                                    <br>
                                    <!-- <div>
                                        <img src="img/download.jpeg">
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id1" class="form-control">
                                    <?php
                                    $sql_cat = "SELECT * FROM category " ;
                                    $query = mysqli_query($conn,$sql_cat);
                                    $num = mysqli_num_rows($query);
                                  
                                    if($num>0){
                                        while($array = mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <option value=<?php echo $array['cat_id'] ?>><?php echo $array['cat_name'] ?></option>
                                        <?php
                                         }
                                        }
                                    ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>Còn hàng</option>
                                        <option value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="prd_details" class="form-control" rows="3"></textarea>
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