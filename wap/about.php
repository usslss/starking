<?php
include_once "../php/connect.php";
$page = "about";
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
		
		<div class="about">
			<img src="images/about1.png" class="wz" alt="星国王，介绍">
			<img src="images/about2.png" class="pic" alt="星国王，介绍">
		</div>
		<div class="time">
			<img src="images/time.png" alt="星国王，国王时刻">
		</div>
		
		<div class="news">
			<div class="title">
				<img src="images/news-title.png">
			</div>
			<ul>
 <?php
    $sql = "SELECT * FROM news ORDER BY news_addtime desc LIMIT 6";
	$result = mysqli_query($link, $sql);
    $j = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $newsArr[$j]["news_id"] = $row["news_id"];
        $newsArr[$j]["news_title"] = $row["news_title"];
        $newsArr[$j]["news_time"] = date('m/d', strtotime($row["news_addtime"]));
        //根据伪静态的定义重写转向url
        $newsArr[$j]["news_url"] = "/wap/news_show.php?news_id=" . $row["news_id"];
        $j++;
    }
    $newsSum = $j;

    for ($j = 0; $j < $newsSum; $j++) {
        echo <<< MID
				<li>
					<a href="{$newsArr[$j]["news_url"]}">{$newsArr[$j]["news_title"]}</a>
					<span>{$newsArr[$j]["news_time"]}</span>
				</li>		

MID;
    }
?>				

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