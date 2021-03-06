<?php
include_once "../php/connect.php";
$page = "index";
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
		<!-- header -->
		<?php include_once "php/header.php";?>

		<!-- Swiper -->
		<div class="swiper-container banner">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="images/banner.jpg"></div>
				<div class="swiper-slide"><img src="images/banner.jpg"></div>
				<div class="swiper-slide"><img src="images/banner.jpg"></div>
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
		
		<div class="cpjs">
			<div class="layout">
				<ul>
					<li>
						<img src="images/cp1.jpg" class="fl img" alt="星国王，源自123的美好享受">
						<img src="images/cp1-1.png" class="fr wz" alt="星国王，源自123的美好享受" style="width:2.84rem;height:1.46rem;margin-top:0.97rem;">
					</li>
					<li>
						<img src="images/cp2.jpg" class="fl img" alt="星国王，优选上等阿拉比卡冠军团队精心拼配">
						<img src="images/cp2-1.png" class="fr wz" alt="星国王，优选上等阿拉比卡冠军团队精心拼配" style="width:2.93rem;height:2.24rem;margin-top:0.55rem;">
					</li>
					<li>
						<img src="images/cp3-1.png" class="fl wz" alt="星国王咖啡，新鲜烘焙无限美味组合" style="width:2.80rem;height:1.52rem;margin-top:0.90rem;">
						<img src="images/cp3.jpg" class="fr img" alt="星国王咖啡，新鲜烘焙无限美味组合" >
					</li>
					<li>
						<img src="images/cp4-1.png" class="fl wz" alt="星国王咖啡，精选进口小麦7小时自然醒发" style="width:2.63rem;height:1.56rem;margin-top:0.90rem;">
						<img src="images/cp4.jpg" class="fr img" alt="星国王咖啡，精选进口小麦7小时自然醒发" >
					</li>
                    <div class="clearfix"></div>
				</ul>
			</div>
		</div>
		
		<div class="jieshao">
			<img src="images/title.png" class="title">
			<ul>
				<li>
					<img src="images/wzms1-1.png">
				</li>
				<li>
					<img src="images/wzms2-1.png">
				</li>
				<li>
					<img src="images/wzms3-1.png">
				</li>
				<li>
					<img src="images/wzms4-1.png">
				</li>
				<div class="clearfix"></div>
			</ul>
		</div>
		
		<!--footer-->
		<?php include_once "php/footer.php";?>

	</body>

</html>

<?php
mysqli_close($link);
?>