
<?php
include_once "php/connect.php";
$page = "product";
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
		
		<div class="product">
			<div class="title">
				<img src="images/pro-title1.png">
			</div>
			<ul>
				<li>
					<img src="images/pro1.jpg">
				</li>
				<li>
					<img src="images/pro2.jpg">
				</li>
				<li>
					<img src="images/pro3.jpg">
				</li>
				<li>
					<img src="images/pro4.jpg">
				</li>
				<li>
					<img src="images/pro5.jpg">
				</li>
				<li>
					<img src="images/pro6.jpg">
				</li>
				<div class="clearfix"></div>
			</ul>
			<div class="title">
				<img src="images/pro-title2.png">
			</div>
			<ul>
				<li>
					<img src="images/pro7.jpg">
				</li>
				<li>
					<img src="images/pro8.jpg">
				</li>
				<li>
					<img src="images/pro9.jpg">
				</li>
				<li>
					<img src="images/pro10.jpg">
				</li>
				<li>
					<img src="images/pro11.jpg">
				</li>
				<li>
					<img src="images/pro12.jpg">
				</li>
				<li>
					<img src="images/pro13.jpg">
				</li>
				<li>
					<img src="images/pro14.jpg">
				</li>
				<li>
					<img src="images/pro15.jpg">
				</li>
				<div class="clearfix"></div>
			</ul>
			<div class="icon">
				<img src="images/pro-icon.png">
			</div>
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