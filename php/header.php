<?php 

$class_index='';
$class_about='';
$class_product='';
$class_brand='';
$class_join='';

if ($page=='index'){$class_index="active";};
if ($page=='about'){$class_about="active";};
if ($page=='product'){$class_product="product";};
if ($page=='brand'){$class_brand="active";};
if ($page=='join'){$class_join="active";};

?>
<!-- 移动适配JS脚本 -->
<!-- 
	<script type="text/javascript">
    if (window.location.toString().indexOf('pref=padindex') != -1) {
    } else {
        if (/AppleWebKit.*Mobile/i.test(navigator.userAgent) || /\(Android.*Mobile.+\).+Gecko.+Firefox/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
            if (window.location.href.indexOf("?mobile")<0){
                try {
                    if (/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                        window.location.href="/wap/";
                    } else if (/iPad/i.test(navigator.userAgent)) {
                        //window.location.href="/wap/"
                    } else {
                        window.location.href="/wap/"
                    }
                } catch (e) {}
            }
        }
    }
</script>
 --> 
		<div class="header">
			<div class="w-1200">
				<div class="logo fl">
					<a href="/"><img src="images/logo.png"></a>
				</div>
				<div class="nav fr">
					<ul>
						<li class="<?php echo $class_index;?>">
							<a href="index.php">
								<img src="images/header-nav1.png" class="xs" alt="星国王，首页">
								<img src="images/header-nav1-1.png" class="yc" alt="星国王，首页">
							</a>
						</li>
						<li class="<?php echo $class_about;?>">
							<a href="about.php">
								<img src="images/header-nav2.png" class="xs" alt="星国王，关于我们">
								<img src="images/header-nav2-1.png" class="yc" alt="星国王，关于我们">
							</a>
						</li>
						<li class="<?php echo $class_product;?>">
							<a href="product.php">
								<img src="images/header-nav5.png" class="xs" alt="星国王，品牌形象">
								<img src="images/header-nav5-1.png" class="yc" alt="星国王，品牌形象">
							</a>
						</li>
						<li class="<?php echo $class_brand;?>">
							<a href="brand.php">
								<img src="images/header-nav3.png" class="xs" alt="星国王，品牌形象">
								<img src="images/header-nav3-1.png" class="yc" alt="星国王，品牌形象">
							</a>
						</li>
						<li class="<?php echo $class_join;?>">
							<a href="join.php">
								<img src="images/header-nav4.png" class="xs" alt="星国王，加入我们">
								<img src="images/header-nav4-1.png" class="yc" alt="星国王，加入我们">
							</a>
						</li>
					</ul>
				</div>
				<div class="tel">
					<img src="images/tel.png" alt="星国王，电话">
					<img src="images/tel1.png" class="xs" alt="星国王，加盟电话：400-085-2375">
				</div>
			</div>
		</div>		