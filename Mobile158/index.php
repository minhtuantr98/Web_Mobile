<?php 
session_start();

define('TEMPLATE',true);
include_once('config/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Home</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
</head>

<style>
/* #menu {
	position :  fixed ;
	z-index : 996 ;
	top 0;
	width : 82.3%;
} */
.fixed { position:fixed;
	z-index : 9999;
	width : 82.3%;
}
#mainbroad {
	position: relative;
	z-index: 997;
}

#popup-full {
	z-index: 999;
	width: 100%;
	height: 100%;
	opacity: 0.5;
	background: gray;
	position: fixed;

}
/* Pop-up  */
#popup-main {
	position: fixed;
	z-index: 1000;
	margin-top: 15%;
	margin-left: 50%;
	transform: translate(-50%, 0)
}

#popup-main span img {
	width: 400px;
	height: 300px;
}

#popup-main button {
	width: 50px;
	height: 50px;
	background: black;
	color: red;
	font-size: 30px;
	border-radius: 100%;
	position: absolute;
	top: -20px;
	right: -20px;
}
/* Scroll-top  */
.scroll-top {
	width: 40px;
	height: 40px;
	position: fixed;
	bottom: 25px;
	right: 20px;
	display: none;
	z-index: 998;
}

.scroll-top i {
	display: inline-block;
	color: #FFFFFF;
}
</style>
<script type=”text/javascript” src=”https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js”></script>
<script type="text/javascript">
$(document).ready(function() {
var aboveHeight = 50;
    $(window).scroll(function(){
        if ($(window).scrollTop() > aboveHeight){
        $('#menu').addClass('fixed').css('top','0').next().css('padding-top','60px');
        } else {
       $('#menu').removeClass('fixed').next().css('padding-top','0');
        }
    });
});
</script>
<body>

<div id="popup-full">
	</div>
	<!-- Pop-up nổi lên -->
	<div id="popup-main">
		<span><img src="admin/products/OPPO-A3s–16GB-Red.png"></span>
		<button id="x">X</button>
	</div>
	<!-- Các function jQuery -->
	<script>
		// Giúp ẩn pop-up sau khi click
		$(document).ready(function () {
			$("#x").click(function () {
				$("#popup-full,#popup-main").fadeOut(1000);
			})
		});
		// Tạo nút scroll top
		$(document).ready(function () {

			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('.scroll-top').fadeIn(10);
				} else {
					$('.scroll-top').fadeOut(10);
				}
			});

			$('.scroll-top').click(function () {
				$("html, body").animate({
					scrollTop: 0
				}, 100);
				return false;
			});

		});
	</script>
<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
        	<?php include_once('Modules/logo/logo.php') ?>
            <?php include_once('Modules/search/search_box.php') ?>
            <?php include_once('Modules/cart/cart_info.php') ?>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<!-- Tấm nền mờ popup -->
	<div id="mainbroad" class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            <?php include_once("Modules/category/menu.php") ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                    <?php
                        include_once('Modules/slide/slide.php'); 
                    ?>
                <!--	End Slider	-->
                
                <?php
                if(isset($_GET['page_layout'])){
                    switch ($_GET['page_layout']) {
                        case 'trangchu':
                            include "stastic.php";
                            break;
                        case 'cart':
                            include "Modules/cart/cart.php";
                            break;
                        case 'product':
                            include "Modules/products/product.php";
                            break;
                        case 'category':
                            include "Modules/category/category.php";
                            break;
                        case 'search':
                            include "Modules/search/search.php";
                            break;	
                        case 'success':
                            include "success.php";
                            break;	
                        default:
                            include ('Modules/products/featured.php');
                            include ('Modules/products/lastest.php');
                            break;
                    }
                }else{
                    include ('Modules/products/featured.php');
                    include ('Modules/products/lastest.php');
                    }
                ?>
            </div>
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<?php include_once('Modules/banner/banner.php') ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
		<i class="fa fa-chevron-up"></i>
	</button>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
        	<?php include_once('Modules/logo/logo_footer.php') ?>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
            	<?php include_once('Modules/address/address.php') ?>
            </div>
            <div id="service" class="col-lg-3 col-md-6 col-sm-12">
                 <?php include_once('Modules/service/service.php') ?>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
                  <?php include_once('Modules/hotline/hotline.php') ?>
            </div>
        </div>
    </div>
</div>
<!--	Footer	-->
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            <?php include_once('Modules/footer/footer.php') ?>
            </div>
        </div>
    </div>
</div>

<!--	End Footer	-->




</body>
</html>
