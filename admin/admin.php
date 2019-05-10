<?php 
$name = $_SESSION['mail'] ;
$sql = "SELECT * FROM user WHERE user_mail = '$name' ";
$query =mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vietpro Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><span>Vietpro</span>Shop</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $row['user_full']  ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="?page_layout=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="comment.html"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>

	</div>
	<!--/.sidebar-->
	<?php
	// master page ở đây: GET + switch case
	// đường dẫn master page: 
	//http://localhost/PHPK158/vietpro_mobile_shop/admin/admin.php?page_layout=add_category
	if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){	
	if(isset($_GET['page_layout'])){
			switch($_GET['page_layout']){
				case 'category':
					include('category.php');
					break;
				case 'add_category':
					include('add_category.php');
					break;
				case 'edit_category':
					include('edit_category.php');
					break;
				case 'user':
					include('user.php');
					break;
				case 'add_user':
					include('add_user.php');
					break;
				case 'edit_user':
					include('edit_user.php');
					break;
				case 'product':
					include('product.php');
					break;
				case 'add_product':
					include('add_product.php');
					break;
				case 'edit_product':
					include('edit_product.php');
					break;
				case 'del_user':
					include('del_user.php');
					break;
				case 'del_cat':
					include('del_cat.php');
					break;
				case 'del_prd':
					include('del_prd.php');
					break;
			}
		}
		else{
			include_once('sub_admin.php');
		}
	} else {
		header("location:index.php");
	}
	
	?>
</body>

</html>
