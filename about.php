<?php
include_once "php/connect.php";
$page = "about";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<?php include_once "php/keywords.php";?>
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
		<script type="text/javascript" src="js/backtop.js"></script>
	</head>

	<body>
		<!-- header -->
		<?php include_once "php/header.php";?>
		<!-- Swiper -->
		<div class="swiper-container banner">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="images/banner1.jpg"></div>
				<div class="swiper-slide"><img src="images/banner1.jpg"></div>
				<div class="swiper-slide"><img src="images/banner1.jpg"></div>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>

		<!-- Initialize Swiper -->
		<script>
			var swiper = new Swiper('.swiper-container', {
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
			});
		</script>

		<div class="about">
			<div class="w-1200">
				<img src="images/about1.png" alt="星国王，介绍">
				<img src="images/about2.png" class="pic">
			</div>
		</div>
		<div class="time">
			<img src="images/time.jpg" alt="国王时刻">
		</div>

		<!--news-->
		<?php include_once "php/about/news_list.php";?>		

		<!--footer-->
		<?php include_once "php/footer.php";?>

		<div id="goToTop">
			<a href="javascript:;"><img src="images/top.png"></a>
		</div>
		
	</body>

</html>

<?php
mysqli_close($link);
?>