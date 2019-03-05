<?php
include_once "../php/connect.php";
$page = "product";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta http-equiv="x-rim-auto-match" content="none" />
		<meta name="format-detection" content="telephone=no" />
		<?php include_once "php/keywords.php";?>
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
		<script type="text/javascript" src="js/phone.js"></script>
	</head>

	<body>
	<body>
		<!-- header -->
		<?php include_once "php/header.php";?>
		
		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>

		<div class="product">
			<div class="title1">
				<img src="images/product-title1.png">
			</div>

			<!-- Swiper -->
			<div class="swiper-container pro1">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="images/pro1.jpg"></div>
					<div class="swiper-slide"><img src="images/pro2.jpg"></div>
					<div class="swiper-slide"><img src="images/pro3.jpg"></div>
					<div class="swiper-slide"><img src="images/pro4.jpg"></div>
					<div class="swiper-slide"><img src="images/pro5.jpg"></div>
					<div class="swiper-slide"><img src="images/pro6.jpg"></div>
					<div class="swiper-slide"><img src="images/pro7.jpg"></div>
					<div class="swiper-slide"><img src="images/pro8.jpg"></div>
					<div class="swiper-slide"><img src="images/pro9.jpg"></div>
				</div>
            </div>

			<div class="title2">
				<img src="images/product-title2.png">
			</div>
			
			<div class="swiper-container pro2">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="images/pro10.jpg"></div>
					<div class="swiper-slide"><img src="images/pro11.jpg"></div>
					<div class="swiper-slide"><img src="images/pro12.jpg"></div>
					<div class="swiper-slide"><img src="images/pro13.jpg"></div>
					<div class="swiper-slide"><img src="images/pro14.jpg"></div>
					<div class="swiper-slide"><img src="images/pro15.jpg"></div>
					<div class="swiper-slide"><img src="images/pro16.jpg"></div>
					<div class="swiper-slide"><img src="images/pro17.jpg"></div>
					<div class="swiper-slide"><img src="images/pro18.jpg"></div>
					<div class="swiper-slide"><img src="images/pro19.jpg"></div>
				</div>
            </div>

			<!-- Initialize Swiper -->
			<script>
				var swiper = new Swiper('.pro1', {
					loop: true,
					effect: 'coverflow',
					grabCursor: true,
					centeredSlides: true,
					slidesPerView: 'auto',
					coverflow: {
						rotate: 0, // 旋转的角度
						stretch: 0, // 拉伸   图片间左右的间距和密集度
						depth: 0, // 深度   切换图片间上下的间距和密集度
						modifier: 3, // 修正值 该值越大前面的效果越明显
						slideShadows: false // 页面阴影效果
					}
				});
				var swiper = new Swiper('.pro2', {
					loop: true,
					effect: 'coverflow',
					grabCursor: true,
					centeredSlides: true,
					slidesPerView: 'auto',
					coverflow: {
						rotate: 0, // 旋转的角度
						stretch: 0, // 拉伸   图片间左右的间距和密集度
						depth: 0, // 深度   切换图片间上下的间距和密集度
						modifier: 3, // 修正值 该值越大前面的效果越明显
						slideShadows: false // 页面阴影效果
					}
				});
			</script>

		</div>

		<!--footer-->
		<?php include_once "php/footer.php";?>

	</body>

</html>

<?php
mysqli_close($link);
?>