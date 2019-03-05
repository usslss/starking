<?php
include_once "php/connect.php";
$page = "about";

if (isset($_POST["news_id"])) {
    $news_id = $_POST["news_id"];
}

if (isset($_GET["news_id"])) {
    $news_id = $_GET["news_id"];
}

//本条新闻内容
$sql_hot = "SELECT * FROM news WHERE news_id='{$news_id}'";
$result = mysqli_query($link, $sql_hot);

while ($row = mysqli_fetch_assoc($result)) {
    $show_news_class = $row["news_class"];
    $show_news_title = $row["news_title"];
    $show_news_source = $row["news_source"];
    $show_news_click = $row["news_click"];
    $show_news_all = $row["news_all"];
    $show_news_addtime = date("Y-m-d", strtotime($row["news_addtime"]));

}

//关键词 标题 description
$sql_key = "SELECT * FROM page WHERE page_class='{$page}_{$website}'";

$result = mysqli_query($link, $sql_key);

while ($row = mysqli_fetch_assoc($result)) {
    $page_title = $row["page_title"];
    $page_keywords = $row["page_keywords"];
    $page_description = $row["page_description"];
}
//点击数+1
$show_news_click = $show_news_click + 1;
$sql_click = "UPDATE news SET news_click={$show_news_click} WHERE news_id='{$news_id}'";
$result = mysqli_query($link, $sql_click);

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title><?php echo $show_news_title; ?> - <?php echo $page_title; ?></title>
		<meta name="keywords" content="<?php echo $page_keywords; ?>" />
		<meta name="description" content="<?php echo $page_description; ?>">
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
				<div class="fl xq">
					<h1><?php echo $show_news_title; ?></h1>
					<div class="mbx">
						<a href="/">主页</a>&gt;
						<a href="/about/">品牌概况</a>&gt;
						<a href="/about/show_<?php echo $news_id; ?>.html" class="active">品牌资讯</a>
					</div>
					<div class="zw">
					<?php echo $show_news_all; ?>
					</div>
				</div>
				<div class="fr tjxw">
					<div class="title1">
						最新资讯
					</div>
					<ul>
 <?php
$sql = "SELECT * FROM news ORDER BY news_addtime desc LIMIT 5";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $newsArr[$i]["news_id"] = $row["news_id"];
    $newsArr[$i]["news_title"] = $row["news_title"];
    $newsArr[$i]["news_img_url"] = $row["news_img_url"];
    $newsArr[$i]["news_img_alt"] = $row["news_img_alt"];
    $newsArr[$i]["news_summary"] = $row["news_summary"];
    //根据伪静态的定义重写转向url
    $newsArr[$i]["news_url"] = "/about/show_" . $row["news_id"] . ".html";
    $i++;
}
$newsSum = $i;

for ($i = 0; $i < $newsSum; $i++) {
    echo <<< MID
						<li>
							<div class="fl img">
								<a href="{$newsArr[$i]["news_url"]}">
									<img src="{$newsArr[$i]["news_img_url"]}" alt="{$newsArr[$i]["news_img_alt"]}">
								</a>
							</div>
							<div class="fr word">
								<a href="">
									<h3>{$newsArr[$i]["news_title"]}</h3>
									<p>{$newsArr[$i]["news_summary"]}</p>
								</a>
							</div>
						</li>

MID;
}
?>
					</ul>
					<a class="zk"><img src="images/zk-icon.png"></a>
				</div>
				<script type="text/javascript">
					$(document).ready(function() {
						$(".zk").click(function() {
							$(this).fadeOut();
							$(".tjxw ul").css("height","auto");
						});
					});
				</script>
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