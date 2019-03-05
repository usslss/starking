<?php
$thisClass='index_about';
$sql = "SELECT * FROM text WHERE class='{$thisClass}' AND website='{$website}'";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $img_url = $row["img_url"];
    $img_alt = $row["img_alt"];
    $text_all = $row["text_all"];	

}

?>

		<div class="index-about w-1200 mt40">
			<div class="title">
				<div class="fl">
					<h4>清蝉龙虎堂品牌介绍</h4>
					<span>Brand introduction</span>
				</div>
				<div class="fr">
					<a href="/about/">更多&gt;&gt;</a>
				</div>
			</div>
			<div class="about-ny">
				<div class="img fl">
					<img src="/<?php echo $img_url?>" alt="<?php echo $img_alt?>">
				</div>
				<div class="word fr">
					<?php echo $text_all?>
					
				</div>
			</div>
		</div>



