<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$id = $_GET['id'];
$sql ="SELECT * FROM product where prd_id = $id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
                <?php 
                if(isset($_POST['sbm'])){
                    $name = $_POST['comm_name'];
                    $mail = $_POST['comm_mail'];
                    $details = $_POST['comm_details'];
                    date_default_timezone_set('Asia/Bangkok');
                    $date = date('Y-m-d H:i:s');
                    $sql_c = "INSERT INTO comment (prd_id,comm_name,comm_date,comm_mail,comm_details) VALUES ($id,'$name','$date','$mail','$details')";
                    $query_c = mysqli_query($conn,$sql_c);
                    // if($query_c){
                    //     header("location:index.php?page_layout=product&id=$id");
                    // }
                }
                ?>
                <!--	List Product	-->
                <div id="product">
                	<div id="product-head" class="row">
                    	<div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                        	<img src="admin/products/<?php echo $row['prd_image'] ?>">
                        </div>
                        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                        	<h1><?php echo $row['prd_name'] ?></h1>
                            <ul>
                            	<li><span>Bảo hành:</span><?php echo $row['prd_warranty'] ?></li>
                                <li><span>Đi kèm:</span> <?php echo $row['prd_accessories'] ?></li>
                                <li><span>Tình trạng:</span> <?php echo $row['prd_new'] ?></li>
                                <li><span>Khuyến Mại:</span> <?php echo $row['prd_promotion'] ?></li>
                                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                                <li id="price-number"><?php echo number_format($row['prd_price'],0,'','.').'đ' ?></li>
                                <li id="status" class="<?php if($row['prd_status']==1){echo "text-success";} else {echo "text-danger";} ?>"><?php if($row['prd_status']==1){echo "Còn Hàng";} else {echo "Hết Hàng";} ?></li>
                            </ul>
                            <div id="add-cart"><a href="Modules/cart/add-cat.php?prd_id=<?php echo $row['prd_id']; ?>">Mua ngay</a></div>
                        </div>
                    </div>
                    <div id="product-body" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3><?php echo 'Chi tiết về '.$row['prd_name']; ?></h3>
                            <?php echo "<p>".$row['prd_details']."</p>" ?>
                         
                        </div>
                    </div>
                    
                    <!--	Comment	-->
                    <div id="comment" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>Bình luận sản phẩm</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label>Tên:</label>
                                    <input name="comm_name" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung:</label>
                                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>     
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
                            </form> 
                        </div>
                    </div>
                    <!--	End Comment	-->  
                    <?php
                    $rowPerPage=3;
                    $keyStart = $page*$rowPerPage -$rowPerPage;
                    $sql_cm = "SELECT * FROM comment where prd_id = $id order by comm_id desc LIMIT $keyStart,$rowPerPage";
                    $query_cm=mysqli_query($conn,$sql_cm);
                    $num_cm = mysqli_num_rows($query_cm);
                    ?>
                    <!--	Comments List	-->
                    <div id="comments-list" class="row">
                    	<div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="comment-item">
                            <?php if($num_cm>0){ while($row_cm = mysqli_fetch_array($query_cm)) {?>
                                <ul>
                                    <li><b><?php echo $row_cm['comm_name'] ?></b></li>
                                    <li><?php echo $row_cm['comm_date'] ?></li>
                                    <li>
                                        <p><?php echo $row_cm['comm_details'] ?></p>
                                    </li>
                                </ul>
                            <?php 
                            }
                        }
                            ?>
                            </div>
                        </div>
                    </div>
                    <!--	End Comments List	-->
                </div>

                <!--	End Product	--> 
               <?php
                   
                     $sql_dem = "SELECT * FROM comment WHERE prd_id = $id";
                     $query_dem = mysqli_query($conn,$sql_dem);
                     $dem = mysqli_num_rows($query_dem);

                     $soTrang = ceil($dem/$rowPerPage) ;
            
                    ?>
                <div id="pagination">
                   
                    <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="<?php if($page==1){
                                    $pagePre == 1 ;
        
                                }
                                else {
                                    $pagePre = $page -1 ;
                                } 
                                echo '?page_layout=product&id='.$id.'&page='.$pagePre ;
                                ?>">&laquo;</a></li>
                                <?php for($i=1;$i<=$soTrang;$i++){ ?>
                                <li class="page-item <?php  if($page == $i) {echo 'active';} ?>" ><a class="page-link" href="<?php echo '?page_layout=product&id='.$id.'&page='.$i  ?>"><?php echo $i; ?></a></li>
                                <?php 
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php if($page==$soTrang){
                                    $pageNext = $soTrang ;
                                }
                                else {
                                    $pageNext = $page + 1 ;
                                } 
                                echo '?page_layout=product&id='.$id.'&page='.$pageNext  ;
                                ?>">&raquo;</a></li>
                           
                    </ul> 
                </div>