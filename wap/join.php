<?php
include_once "../php/connect.php";
$page = "join";
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

		<script>
			$(".tel").click(function() {
				$(".tel1").fadeIn();
			});
			$(document).mousedown(function(e) {
				var _con = $(".tel1");
				if(!_con.is(e.target) && _con.has(e.target).length === 0) {
					$(".tel1").hide();
				}
			});
			$(".nav").click(function() {
				$(".xl-nav").fadeIn();
			});
			$(document).mousedown(function(e) {
				var _con = $(".xl-nav");
				if(!_con.is(e.target) && _con.has(e.target).length === 0) {
					$(".xl-nav").hide();
				}
			});
		</script>
		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>
		<div class="join">
			<img src="images/join1.jpg">
			<img src="images/join2.jpg">
			<img src="images/join3.jpg">
		</div>
		<div class="ly">
			<p><img src="images/ly1.png" style="width:6.77rem;height:0.67rem;margin:0 auto;"></p>
			<p ><img src="images/ly2.png" style="width:4.33rem;height:0.2rem;margin:0 auto;"></p>
			<form id="msgform">
			<input type="text" name="name" placeholder="请输入您的姓名" />
			<input type="text" name="phone" placeholder="请输入您的联系方式" />
			<textarea id="t1" name="content"></textarea>
			<a href="javascript:void()" class="tj" id="msg">提交留言</a>
			</form>
			<script>
				document.getElementById("t1").value = "你想了解加盟费用?还是对加盟流程有问题?"		
				
				//留言
				$(function () {
					$("#msg").click(function () {
						var cont1 = $("#msgform").serialize();
						$.ajax({
							url: 'php/msg.php',
							type: 'post',
							dataType: 'text',
							data: cont1,
							success: function (result) {
								alert(result);
							}
						});
					});
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