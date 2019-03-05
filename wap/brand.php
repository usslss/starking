<?php
include_once "../php/connect.php";
$page = "brand";
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
		<!-- pc适配JS脚本 -->
				
	</head>

	<body>
		<!-- header -->
		<?php include_once "php/header.php";?>

		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>
		<div class="brand">
			<img src="images/brand_01.png">
			<img src="images/brand_02.png">
			<img src="images/brand_03.png">
			<img src="images/brand_04.png">
			<img src="images/brand_05.png">
			<img src="images/brand_06.png">
			<img src="images/brand_07.png">
			<img src="images/brand_08.png">
			<img src="images/brand_09.png">
			<img src="images/brand_10.png">
		</div>
		
		<!--footer-->
		<?php include_once "php/footer.php";?>

	</body>

</html>

<?php
mysqli_close($link);
?>