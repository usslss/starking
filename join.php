<?php
include_once "php/connect.php";
$page = "join";
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

		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>

		<div class="join">
			<div class="w-1200">
				<img src="images/join-title.png" alt="星国王，加盟细则">
				<dl>
					<dt>
						<img src="images/join1-1.png" alt="星国王，整店输出">
					</dt>
					<dd>
						<img src="images/join1-2.png" alt="星国王，精细托管">
					</dd>
					<dd>
						<img src="images/join1-3.png" alt="星国王，培训输出">
					</dd>
					<dd>
						<img src="images/join1-4.png" alt="星国王，新品推送">
					</dd>
					<dd>
						<img src="images/join1-5.png" alt="星国王，品控保证">
					</dd>
				</dl>
				<img src="images/join2.png" alt="星国王，八大加盟支持">
			</div>
		</div>
		<div class="join-lc">
			<img src="images/join3.png" alt="星国王，加盟流程">
		</div>
		<div class="join-px">
			<img src="images/join4.png" alt="星国王，培训课程">
		</div>
		<div class="join-tj">
			<img src="images/join5.jpg" alt="星国王，加盟条件">
		</div>

		<div class="ly">
			<p><img src="images/ly1.png"></p>
			<p style="margin-bottom: 60px;"><img src="images/ly2.png"></p>
			<form id="msgform">
			<input type="text" name="name" placeholder="请输入您的姓名" />
			<input type="text" name="phone" placeholder="请输入您的联系方式" />
			<textarea id="t1" name="content"></textarea>
			<a href="javascript:void()" class="tj" id="msg">提交留言</a>
			</form>
			<script>
				document.getElementById("t1").value = "你想了解加盟费用?还是对加盟流程有问题?"
			</script>
		</div>		
		<script>		
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