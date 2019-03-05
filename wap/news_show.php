<?php
include_once "../php/connect.php";
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
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta http-equiv="x-rim-auto-match" content="none" />
		<meta name="format-detection" content="telephone=no" />
		<title><?php echo $show_news_title; ?> - <?php echo $page_title; ?></title>
		<meta name="keywords" content="<?php echo $page_keywords; ?>" />
		<meta name="description" content="<?php echo $page_description; ?>">
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
		<script type="text/javascript" src="js/phone.js"></script>
		<!-- pc适配JS脚本 -->
				
	</head>

	<body>
		<!-- header -->
		<?php include_once "php/header.php";?>

		<div class="bannerc">
			<img src="images/bannerc.jpg">
		</div>
		
		<div class="news-show">
			<h1><?php echo $show_news_title; ?></h1>
			<div class="mbx">
				<a href="/wap">主页</a>&gt;<a href="about.php">品牌概况</a>&gt;<a href="" class="active">品牌资讯</a>
			</div>
			<div class="zw">
				<?php echo $show_news_all; ?>
			</div>
		</div>

		<!--footer-->
		<?php include_once "php/footer.php";?>

	</body>

</html>

<?php
mysqli_close($link);
?>