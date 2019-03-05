<?php
$sql = "SELECT * FROM news WHERE news_website='{$website}' AND news_class='加盟问答' ORDER BY news_addtime desc LIMIT 10";
$result = mysqli_query($link, $sql);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $newsArr[$i]["news_id"] = $row["news_id"];
    $newsArr[$i]["news_title"] = $row["news_title"];
    $newsArr[$i]["news_summary"] = $row["news_summary"];
    $newsArr[$i]["news_addYM"] = substr($row["news_addtime"],0,4)."/".substr($row["news_addtime"],5,2);
	$newsArr[$i]["news_addD"] = substr($row["news_addtime"],8,2);
    //根据伪静态的定义重写转向url
    $newsArr[$i]["news_url"] = "/news/show_" . $row["news_id"].".html";
    $i++;
}
$newsSum=$i;
?>

        <div class="index-news">
			<div class="title">
				<img src="images/cooperation3-title.png">
			</div>
			<div class="news-list">
				<ul>
<?php

for ($i = 0; $i < $newsSum; $i++) {
    echo <<< EOT
					<li>
						<div class="fl">
							<p>{$newsArr[$i]["news_addD"]}</p>
							<span>{$newsArr[$i]["news_addYM"]}</span>
						</div>
						<div class="fr">
							<a href="{$newsArr[$i]["news_url"]}">
								<h3>{$newsArr[$i]["news_title"]}</h3>
								<p>{$newsArr[$i]["news_summary"]}</p>
							</a>
						</div>
					</li>
EOT;

}

?>

					<div class="clear"></div>
				</ul>
			</div>
		</div>


