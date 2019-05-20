
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý comment</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý comment</h1>
			</div>
		</div><!--/.row-->
								<div <?php
					           if(isset($error_del)){ ?> class="alert alert-danger">
                                <?php 
						           echo $error_del;
								}
								?> </div>
	
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Sản Phẩm</th>
										<th>Tên Người Bình Luận</th>
                                        <th>Email</th>
                                        <th>Giờ</th>
                                        <th>Chi Tiết Bình Luận</th>
                                        <th>Hành Động</th>
									</tr>
									</thead>
									<tbody>
									<?php 
										$sql_category = "SELECT * FROM comment ORDER BY comm_id DESC " ;
										$query = mysqli_query($conn,$sql_category);
										$num = mysqli_num_rows($query);

										if($num>0){
											while($row = mysqli_fetch_array($query))
											{
												?>
												<tr>
												<td><?php echo $row['comm_id'] ?></td>
                                                <td><?php echo $row['prd_id'] ?></td>
                                                <td><?php echo $row['comm_name'] ?></td>
                                                <td><?php echo $row['comm_mail'] ?></td>
                                                <td><?php echo $row['comm_date'] ?></td>
                                                <td><?php echo $row['comm_details'] ?></td>
                                                <td class="form-group">
													<a href="?page_layout=edit_comment&id=<?php echo $row['comm_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
													<a href="del_comment.php?id=<?php echo $row['comm_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
												</td>
												</tr>
												<?php
											}
										}

									?>

					
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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