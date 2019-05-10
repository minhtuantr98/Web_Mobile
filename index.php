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
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>

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
	<div class="container">
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
