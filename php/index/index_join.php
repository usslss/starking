<?php
$thisClass='index_join';
$sql = "SELECT * FROM text WHERE class='{$thisClass}' AND website='{$website}'";
$result = mysqli_query($link, $sql);
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
	$joinArr[$i]["title"] = $row["title"];
	$joinArr[$i]["en_title"] = $row["summary"];
    $joinArr[$i]["img_url"] = $row["img_url"];
    $joinArr[$i]["img_alt"] = $row["img_alt"];
    $joinArr[$i]["text_all"] = $row["text_all"];	
	$i++;
}

?>

		<div class="index-adv w-1200 mt40">
			<div class="title">
				<div class="fl">
					<h4>清蝉龙虎堂加盟优势</h4>
					<span>Join Advantage</span>
				</div>
				<div class="fr">
					<a href="/join/">更多&gt;&gt;</a>
				</div>
			</div>
			<ul>
<?php 
for ($i=0; $i < 4; $i++) { 
echo <<< USS
				<li>
					<img src="/{$joinArr[$i]["img_url"]}" alt="{$joinArr[$i]["img_alt"]}">
					<h3>{$joinArr[$i]["title"]} <span>/ {$joinArr[$i]["en_title"]}</span></h3>
					{$joinArr[$i]["text_all"]}
				</li>
	
USS;
}
?>

				<div class="clear"></div>
			</ul>
		</div>


