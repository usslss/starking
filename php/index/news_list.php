<?php

//获得新闻类别名称
$sql = "SELECT * FROM img WHERE class='news_banner' AND website='{$website}'";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $className = explode('_', $row["name"]);
    $classArr[$i]["name"] = $className[1];
    $classArr[$i]["en_name"] = $className[0];
    $classArr[$i]["img_url"] = $row["url"];
    $classArr[$i]["alt"] = $row["alt"];
    //根据伪静态的定义重写转向url
	if ($classArr[$i]["name"] == '品牌动态') {
        $classArr[$i]["name2"] = 'brand';
    }else if($classArr[$i]["name"] == '行业资讯'){
        $classArr[$i]["name2"] = 'industry';
	}else if($classArr[$i]["name"] == '开店技巧'){
        $classArr[$i]["name2"] = 'skill';
	}else if($classArr[$i]["name"] == '加盟问答'){
        $classArr[$i]["name2"] = 'question';
	}
    $classArr[$i]["url"] = "/news/" . $classArr[$i]["name2"] . "_1/";
    $i++;
}

?>

		<div class="index-news w-1200 mt40">
			<div class="title">
				<div class="fl">
					<h4>品牌资讯&奶茶大课堂</h4>
					<span>Brand consulting & milk tea class</span>
				</div>
				<div class="fr">
					<a href="/news/">更多&gt;&gt;</a>
				</div>
			</div>
			<ul>
<?php

for ($i = 0; $i < 4; $i++) {
    echo <<< TOU
				<li>
					<div class="img">
						<a href="{$classArr[$i]["url"]}" target="_blank"><img src="{$classArr[$i]["img_url"]}" alt="{$classArr[$i]["alt"]}"></a>
					</div>
					<dl>
						<dt><span>{$classArr[$i]["en_name"]}</span> {$classArr[$i]["name"]}</dt>

TOU;

    $sql = "SELECT * FROM news WHERE news_class='{$classArr[$i]["name"]}' AND news_website='{$website}' ORDER BY news_addtime desc LIMIT 7";
	$result = mysqli_query($link, $sql);
    $j = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $newsArr[$j]["news_id"] = $row["news_id"];
        $newsArr[$j]["news_title"] = $row["news_title"];
        $newsArr[$j]["news_time"] = date('Y/m/d', strtotime($row["news_addtime"]));
        //根据伪静态的定义重写转向url
        $newsArr[$j]["news_url"] = "/news/show_" . $row["news_id"] . ".html";
        $j++;
    }
    $newsSum = $j;

    for ($j = 0; $j < $newsSum; $j++) {
        echo <<< MID
						<dd>
							<a href="{$newsArr[$j]["news_url"]}" target="_blank">{$newsArr[$j]["news_title"]}</a>
							<span>{$newsArr[$j]["news_time"]}</span>
						</dd>

MID;
    }
    echo <<< WEI
					</dl>
				</li>
WEI;

}

?>

			</ul>
		</div>



