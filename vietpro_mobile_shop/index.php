<?php 
    session_start();
    include_once('config/connect.php'); 
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<!--Popup--> 
<script type="">
    $(document).ready(function(e){
        $('#AdsFloat #AdsNav a').click(function(){
            var chg;
            $('#AdsMain').slideToggle();
            chg = $('#AdsFloat #AdsNav a').text();
            if(chg == 'Tắt Quảng Cáo'){
                $('#AdsFloat #AdsNav a').text('Bật Quảng Cáo');
            }
            else{
                $('#AdsFloat #AdsNav a').text('Tắt Quảng Cáo');
            }
        });
        $('#backtotop').click(function() {
            $('html, body').animate({scrollTop:0},500);
        });
    });
</script>
<div id="AdsFloat">
    <div id="AdsNav">
        <a href="#">Tắt Quảng Cáo</a>
    </div>
    <div id="AdsMain">
        <img src="images/Rightbanner_iphone_0804.png">
    </div>    
</div>
<!--End Popup-->
<!-- Back To Top -->
<div id="backtotop">
    <a><img src="images/top.png.png"></a>
</div>
<!--Header	-->
<div id="header" class="fixed">
	<div class="container">
    	<div class="row">
            <?php include_once('modules/logo/logo.php') ?>
            <?php include_once('modules/search/search-box.php');
                    include_once('modules/cart/cart-icon.php');
            ?>
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
            	<?php include_once('modules/category/menu.php'); ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <div id="slide" class="carousel slide" data-ride="carousel">

                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#slide" data-slide-to="0" class="active"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                    <li data-target="#slide" data-slide-to="3"></li>
                    <li data-target="#slide" data-slide-to="4"></li>
                    <li data-target="#slide" data-slide-to="5"></li>
                  </ul>
                
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="images/slide-1.png" alt="Vietpro Academy">
                    </div>
                    <div class="carousel-item">
                      <img src="images/slide-2.png" alt="Vietpro Academy">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide-3.png" alt="Vietpro Academy">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide-4.png" alt="Vietpro Academy">
                    </div>
                     <div class="carousel-item">
                      <img src="images/slide-5.png" alt="Vietpro Academy">
                    </div>
					<div class="carousel-item">
                      <img src="images/slide-6.png" alt="Vietpro Academy">
                    </div>
                  </div>
                
                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#slide" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#slide" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                
                </div>
             
                <?php 
                if(isset($_GET['page_layout']))
                {
                    switch ($_GET['page_layout']) {
                        case 'product': include "modules/products/product.php"; break;
                        case 'cart': include "modules/cart/cart.php"; break;
                        case 'search': include "modules/search/search.php"; break;
                        case 'success': include "modules/cart/success.php"; break;
                        case 'category': include "modules/category/category.php"; break;
                        case 'cart' :include "modules/cart/cart.php"; break;
                    }
                }
                else {
                    include "modules/products/feature.php";
                    include "modules/products/latest.php";
                }
                ?>
             
               
            </div>
            <!-- end slide -->
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<div id="banner">
                	<div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-1.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-2.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-3.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-4.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-5.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-6.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
            <?php include_once('modules/logo/logo-footer.php'); ?>
            <?php include_once('modules/address/address.php'); ?>
            <?php include_once('modules/service/services.php');?>
            <?php include_once('modules/hotline/hotline.php'); ?>
        </div>
    </div>
</div>

<!--	Footer	-->
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<p>
                    2018 © Vietpro Academy. All rights reserved. Developed by Vietpro Software.
                </p>
            </div>
        </div>
    </div>
</div>
<!--	End Footer	-->













</body>
</html>
