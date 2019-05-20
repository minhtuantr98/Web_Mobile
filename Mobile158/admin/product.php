<?php 
if(!defined('TEMPLATE')){
    die('Ban k co quyen truy cap');
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}

$rowPerPage = 5 ;
$keyStart = $page*$rowPerPage -$rowPerPage;
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="?page_layout=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                            <?php 
										$sql_product = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $keyStart,$rowPerPage" ;
										$query = mysqli_query($conn,$sql_product);
										$num = mysqli_num_rows($query);

										if($num>0){
											while($row = mysqli_fetch_array($query))
											{
								?>
                                    <tr>
                                        <td style=""><?php echo $row['prd_id'] ?></td>
                                        <td style=""><?php echo $row['prd_name'] ?></td>
                                        <td style=""><?php echo number_format($row['prd_price'],0,'','.') ?></td>
                                        <td style="text-align: center"><img width="130" height="180" src="products/<?php echo $row['prd_image'] ?>" /></td>
                                        <td><span <?php if($row['prd_status']==1){ ?>class="label label-success"> <?php echo "Còn Hàng" ;}else{
                                                ?> class="label label-danger"> <?php echo "Hết hàng" ;
                                            } ?> </span></td>
                                        <td><?php echo $row['cat_name'] ?></td>
                                        <td class="form-group">
                                            <a href="?page_layout=edit_product&id=<?php echo $row['prd_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="?page_layout=del_prd&id=<?php echo $row['prd_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                    <?php
											}
										}
									?>      
                            </tbody>
						</table>
                    </div>
                    <?php
                     $sql_dem = 'SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ';
                     $query_dem = mysqli_query($conn,$sql_dem);
                     $dem = mysqli_num_rows($query_dem);

                     $soTrang = ceil($dem/$rowPerPage) ;
            
                    ?>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="<?php if($page==1){
                                    $pagePre == 1 ;
        
                                }
                                else {
                                    $pagePre = $page -1 ;
                                } 
                                echo '?page_layout=product&page='.$pagePre ;
                                ?>">&laquo;</a></li>
                                <?php for($i=1;$i<=$soTrang;$i++){ ?>
                                <li class="page-item <?php  if($page == $i) {echo 'active';} ?>" ><a class="page-link" href="<?php echo '?page_layout=product&page='.$i ?>"><?php echo $i; ?></a></li>
                                <?php 
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php if($page==$soTrang){
                                    $pageNext = $soTrang ;
                                }
                                else {
                                    $pageNext = $page + 1 ;
                                } 
                                echo '?page_layout=product&page='.$pageNext ;
                                ?>">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
