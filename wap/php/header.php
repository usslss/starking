<?php 

$class_index='';
$class_about='';
$class_product='';
$class_brand='';
$class_join='';

if ($page=='index'){$class_index='class="active"';};
if ($page=='about'){$class_about='class="active"';};
if ($page=='product'){$class_product='class="active"';};
if ($page=='brand'){$class_brand='class="active"';};
if ($page=='join'){$class_join='class="active"';};

?>
	<!-- WAPtoPC 适配JS脚本 -->
	<script>
        if(!(/(android|iphone|ipad|PlayBook|BB10)/i).test(window.navigator.userAgent)){
            window.location.href = 'http://www.starkingscoffee.com/';
        }
    </script>

		<header>
			<div class="layout">
				<a href="javascript:void(0)" class="nav"><img src="images/nav.png"></a>
				<a href="/wap/" class="logo"><img src="images/logo.png"></a>
				<a href="javascript:void(0)" class="tel"><img src="images/tel.png"></a>
				<a href="tel:4000852375" class="tel1"><img src="images/tel1.png"></a>
			</div>
			<div class="xl-nav">
				<ul>
					<li <?php echo $class_index;?>>
						<a href="index.php">首页</a>
					</li>
					<li <?php echo $class_about;?>>
						<a href="about.php">品牌概况</a>
					</li>
					<li <?php echo $class_product;?>>
						<a href="product.php">产品商店</a>
					</li>
					<li <?php echo $class_brand;?>>
						<a href="brand.php">品牌形象</a>
					</li>
					<li <?php echo $class_join;?>>
						<a href="join.php">加入我们</a>
					</li>
				</ul>
			</div>
		</header>
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