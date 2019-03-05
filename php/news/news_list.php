<?php
//导航栏
if (isset($_GET["class"])) {
    $showClassEn = $_GET["class"];
} else if (!isset($showClass)) {
    $showClassEn = 'all';
    $showClassP1 = 'active';
}
$showClassP1 = "";
$showClassP2 = "";
$showClassP3 = "";
$showClassP4 = "";
$showClassP5 = "";

if ($showClassEn == 'all') {
    $showClassP1 = 'active';
    $showClass = '全部资讯';
}
if ($showClassEn == 'brand') {
    $showClassP2 = 'active';
    $showClass = '品牌动态';
}
if ($showClassEn == 'industry') {
    $showClassP3 = 'active';
    $showClass = '行业资讯';
}
if ($showClassEn == 'skill') {
    $showClassP4 = 'active';
    $showClass = '开店技巧';
}
if ($showClassEn == 'qaq') {
    $showClassP5 = 'active';
    $showClass = '加盟问答';
}

//单页显示的条数
$news_shownum = 6; //默认为6
$page_shownum = $news_shownum;
//判断跳转的页数

if (isset($_GET["page"])) {
    $page_jump = $_GET["page"];
    $news_start = ($page_jump - 1) * ($news_shownum) + 1;
} else {
    $page_jump = 1;
    $news_start = 1;
}

//按照时间顺序搜索 新闻
if ($showClass == "全部资讯") {
    $sql_new = "SELECT * FROM news WHERE news_website='{$website}' ORDER BY news_addtime DESC ";
} else {
    $sql_new = "SELECT * FROM news WHERE news_class='{$showClass}' AND news_website='{$website}' ORDER BY news_addtime DESC ";
}

$result = mysqli_query($link, $sql_new);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $newsArr[$i]["news_id"] = $row["news_id"];
    $newsArr[$i]["news_title"] = $row["news_title"];
    $newsArr[$i]["news_summary"] = $row["news_summary"];
    $newsArr[$i]["news_img_url"] = $row["news_img_url"];
    $newsArr[$i]["news_img_alt"] = $row["news_img_alt"];
    $newsArr[$i]["news_click"] = $row["news_click"];
    $newsArr[$i]["news_addtime"] = substr($row["news_addtime"], 0, 10);
    //跳转地址 伪静态
    $newsArr[$i]["news_url"] = "/news/show_" . $row["news_id"] . ".html";
    $i++;
}
$news_sum = $i;

?>
		<div class="news w-1200">
			<div class="news-list fl">
				<div class="news-nav">
					<a href="/news/" class="<?php echo $showClassP1; ?>">全部资讯</a>
					<a href="/news/brand_1/" class="<?php echo $showClassP2; ?>">品牌动态</a>
					<a href="/news/industry_1/" class="<?php echo $showClassP3; ?>">行业资讯</a>
					<a href="/news/skill_1/" class="<?php echo $showClassP4; ?>">开店技巧</a>
					<a href="/news/qaq_1/" class="<?php echo $showClassP5; ?>">加盟问答</a>
				</div>
				<ul>



<?php

for ($i = ($news_start - 1); (($i < ($news_start + $news_shownum - 1)) & ($i < $news_sum)); $i++) {

    echo <<< EOT
					<li>
						<div class="img fl">
							<a href="{$newsArr[$i]["news_url"]}"><img src="{$newsArr[$i]["news_img_url"]}"  alt="{$newsArr[$i]["news_img_alt"]}"></a>
						</div>
						<div class="word fr">
							<a href="{$newsArr[$i]["news_url"]}">
								<h3>{$newsArr[$i]["news_title"]}</h3>
								<p>{$newsArr[$i]["news_summary"]}</p>
								<span>发布日期 : {$newsArr[$i]["news_addtime"]} 浏览量 : {$newsArr[$i]["news_click"]}</span>
							</a>
						</div>
					</li>

EOT;

}
?>
				</ul>
<?php
//分页功能
$page_max = ceil($news_sum / $page_shownum);
$page_prev = max(($page_jump - 1), 1);
$page_next = min(($page_jump + 1), $page_max)
?>
				<div class="fy">
					<a href="<?php echo "/news/" . $showClassEn . "_" . $page_prev . "/"; ?>">上一页</a>
<?php
$page_max = ceil($news_sum / $page_shownum);
for ($i = 1; $i <= $page_max; $i++) {

    if ($i == $page_jump) {
        echo '<a href="javascript:void(0);" class="active">' . $i . '</a>';
    } else {
        echo <<< EOT
					<a href="/news/{$showClassEn}_{$i}/">{$i}</a>
EOT;
    }
}
?>
					<a href="<?php echo "/news/" . $showClassEn . "_" . $page_next . "/"; ?>">下一页</a>
				</div>
			</div>