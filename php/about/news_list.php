		<div class="news">
			<div class="title">
				<img src="images/news-title.png">
			</div>
			<ul>
 <?php
    $sql = "SELECT * FROM news ORDER BY news_addtime desc LIMIT 10";
	$result = mysqli_query($link, $sql);
    $j = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $newsArr[$j]["news_id"] = $row["news_id"];
        $newsArr[$j]["news_title"] = $row["news_title"];
        $newsArr[$j]["news_time"] = date('m/d', strtotime($row["news_addtime"]));
        //根据伪静态的定义重写转向url
        $newsArr[$j]["news_url"] = "/about/show_" . $row["news_id"] . ".html";
        $j++;
    }
    $newsSum = $j;

    for ($j = 0; $j < $newsSum; $j++) {
        echo <<< MID
				<li>
					<a href="{$newsArr[$j]["news_url"]}">
						{$newsArr[$j]["news_title"]}
					</a>
					<span>{$newsArr[$j]["news_time"]}</span>
				</li>		

MID;
    }
?>
				<div class="clearfix"></div>
			</ul>
		</div>