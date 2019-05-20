<?php
$id=$_GET['id'];

$sql_edit = "SELECT * from product where prd_id = $id";
$query_edit = mysqli_query($conn,$sql_edit);

$row_edit = mysqli_fetch_array($query_edit);
if(isset($_POST['sbm'])){
 
    $name = $_POST['prd_name'];
    $price =$_POST['prd_price'];
    $warran = $_POST['prd_warranty'];
    $accsess = $_POST['prd_accessories'];
    $pro =$_POST['prd_promotion'];
    $new = $_POST['prd_new'];
    $cat = $_POST['cat_id'];
    if(isset($_POST['prd_featured']))
    {
        $feature = $_POST['prd_featured'];
    }
    else {
        $feature = 0 ;
    }
    $status = $_POST['prd_status'];
    $detail = $_POST['prd_details'];
    if($_FILES['prd_image']['name']==''){
        $image = $row_edit['prd_image'];
    }
    else {
        $image = $_FILES['prd_image']['name'];
        $image_tmp = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($image_tmp,'products/'.$image);
    }
    
        $sql_update ="UPDATE product SET prd_featured = $feature, prd_image ='$image', prd_name = '$name',prd_price = $price, prd_warranty ='$warran' ,prd_accessories ='$accsess', prd_promotion ='$pro',prd_new = '$new',cat_id =$cat,prd_status=$status,prd_details='$detail' where prd_id =$id";
        $query_update= mysqli_query($conn,$sql_update);
        header("location:index.php?page_layout=product");
    }

?>
<script src="ckeditor/ckeditor.js"></script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active"><?php echo $row_edit['prd_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $row_edit['prd_name'] ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $row_edit['prd_name'] ?>"  placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" name="prd_price" required value="<?php echo number_format($row_edit['prd_price'],0,'','.') ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $row_edit['prd_warranty'] ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $row_edit['prd_accessories'] ?>" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $row_edit['prd_promotion'] ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" required value="<?php echo $row_edit['prd_new'] ?>" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="prd_image" src="products/<?php echo $row_edit['prd_name']; ?>" >
                                    <br>
                                  
                                    <div>
                                        <img src="img/download.jpeg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                    <?php
                                    $sql_cat = "SELECT * FROM category " ;
                                    $query = mysqli_query($conn,$sql_cat);
                                    $num = mysqli_num_rows($query);
                                  
                                    if($num>0){
                                        while($array = mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <option <?php if($row_edit['cat_id']==$array['cat_id']) { echo "selected";} ?> value=<?php echo $array['cat_id'] ?>><?php echo $array['cat_name'] ?></option>
                                        <?php
                                         }
                                        }
                                    ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option <?php if($row_edit['prd_status']==1 ) {echo  "selected"; }  ?> value=1>Còn hàng</option>
                                        <option <?php if($row_edit['prd_status']==2 ) {echo  "selected"; }  ?> value=2>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" <?php if($row_edit['prd_featured']==1){ echo "checked='checked'";} ?> value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" required class="form-control" rows="3"><?php echo $row_edit['prd_details'] ?>
            
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('prd_details');
                                         </script>  
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
