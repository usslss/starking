<?php
include_once "php/connect.php";
$page = "brand";
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
		<script type="text/javascript" src="js/backtop.js" ></script>
	</head>

	<body>

		<!-- header -->
		<?php include_once "php/header.php";?>

		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>
		
		<div class="brand">
			<img src="images/brand_01.jpg">
			<img src="images/brand_02.jpg">
			<img src="images/brand_03.jpg">
			<img src="images/brand_04.jpg">
			<img src="images/brand_05.jpg">
			<img src="images/brand_06.jpg">
			<img src="images/brand_07.jpg">
			<img src="images/brand_08.jpg">
			<img src="images/brand_09.jpg">
			<img src="images/brand_10.jpg">
			
		</div>

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