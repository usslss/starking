<?php
include_once "php/connect.php";
$page = "index";
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

		<div class="cpjs">
			<div class="w-1200">
				<ul>
					<li>
						<img src="images/cp1.jpg" class="fl img" alt="星国王，源自123的美好享受">
						<img src="images/cp1-1.png" class="fr wz" alt="星国王，源自123的美好享受">
					</li>
					<li>
						<img src="images/cp2.jpg" class="fl img" alt="星国王，优选上等阿拉比卡冠军团队精心拼配">
						<img src="images/cp2-1.png" class="fr wz" alt="星国王，优选上等阿拉比卡冠军团队精心拼配">
					</li>
					<li>
						<img src="images/cp3-1.png" class="fl wz" alt="星国王咖啡，新鲜烘焙无限美味组合">
						<img src="images/cp3.jpg" class="fr img" alt="星国王咖啡，新鲜烘焙无限美味组合">
					</li>
					<li>
						<img src="images/cp4-1.png" class="fl wz" alt="星国王咖啡，精选进口小麦7小时自然醒发">
						<img src="images/cp4.jpg" class="fr img" alt="星国王咖啡，精选进口小麦7小时自然醒发">
					</li>

				</ul>
			</div>
		</div>
		<div class="wzms">
			<div class="w-1200">
				<img src="images/title.png" class="bt">
				<ul>
					<li>
						<img src="images/wzms1.png" class="xs" alt="星国王咖啡，经典享受">
						<img src="images/wzms1-1.png" class="yc" alt="星国王咖啡，经典享受">
					</li>
					<li>
						<img src="images/wzms2.png" class="xs" alt="星国王咖啡，精湛手艺">
						<img src="images/wzms2-1.png" class="yc" alt="星国王咖啡，精湛手艺">
					</li>
					<li>
						<img src="images/wzms3.png" class="xs" alt="星国王咖啡，美妙时光">
						<img src="images/wzms3-1.png" class="yc" alt="星国王咖啡，美妙时光">
					</li>
					<li>
						<img src="images/wzms4.png" class="xs" alt="星国王咖啡，纯粹美好">
						<img src="images/wzms4-1.png" class="yc" alt="星国王咖啡，纯粹美好">
					</li>
					<div class="clearfix"></div>
				</ul>
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