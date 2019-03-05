 			<div class="tj fr">
				<ul>
					<li>
						<dl>
							<dt><span>P</span> 品牌动态</dt>
 <?php
    $sql = "SELECT * FROM news WHERE news_class='品牌动态' AND news_website='{$website}' ORDER BY news_addtime desc LIMIT 7";
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
?>
						</dl>
					</li>					
				</ul>
			</div>