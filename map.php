<?php
include_once "php/connect.php";
$page = "index";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>网站地图、网站导航、网站索引_星国王</title>
		<meta name="keywords" content="星国王网站地图,星国王网站导航,星国王网站索引,星国王官网地图,星国王官网导航" />
		<meta name="description" content="为了提升星国王官网（www.starkingscoffee.com）易用性，方便广大用户访问。我们制作了这个简洁的网站索引、网站地图。加盟星国王，财运旺旺旺。" />
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
		<script type="text/javascript" src="js/backtop.js"></script>
	</head>

	<body>
		<!-- header -->
		<?php include_once "php/header.php";?>

		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>

		<div class="news-show">
			<div class="w-1200">
				<div class="fl map">
					<div class="sitemap">
						<dl>
							<dt>主页 _</dt>
							<dd><a title="主页" href="http://www.starkingscoffee.com">主页</a></dd>
						</dl>
						<dl>
							<dt>品牌概况 _</dt>
							<dd>
								<a title="品牌概况" href="http://www.starkingscoffee.com/about/">品牌概况</a>
							</dd>
						</dl>


						<dl>
							<dt>产品商店 _</dt>
							<dd>
								<a title="产品商店" href="http://www.starkingscoffee.com/product/">产品商店</a>
							</dd>
						</dl>
						<dl>
							<dt>品牌形象 _</dt>
							<dd>
								<a title="品牌形象" href="http://www.starkingscoffee.com/brand/">品牌形象</a>
							</dd>
						</dl>
						<dl>
							<dt>加入我们 _</dt>
							<dd><a title="加入我们" href="http://www.starkingscoffee.com/join/">加入我们</a></dd>
						</dl>
						
						<div class="clearfix"></div>
					</div>
				</div>
		

				<div class="clearfix"></div>
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