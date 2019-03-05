<?php
include_once "../connect.php";
$store_page = $_POST['page'];

//单页面展示门店数
$page_show = 8; //默认为8

//获得数量
$sqlsum = "SELECT count(*) from store ORDER BY store_addtime DESC";
$sum = mysqli_fetch_row(mysqli_query($link, $sqlsum))[0];

$sql = "SELECT * from store  ORDER BY store_addtime DESC";
$result = mysqli_query($link, $sql);

$store_start = ($store_page - 1) * $page_show;
$store_end = $store_start + $page_show;
if ($store_end > $sum) {
    $store_end = $sum;
}

$page_sum = ceil($sum / $page_show);

$i = 0;
$j=0;
$json = "";
$url = 'javascript:;';
while ($row = mysqli_fetch_assoc($result)) {
    if (($i >= $store_start) & ($i < $store_end)) {
        $json = "{$json}" . "{\"store_img_url\":\"" . $row["store_img_url"] . "\",\"store_img_alt\":\"" . $row["store_img_alt"] . "\"," .
            "\"store_name\":\"" . $row["store_name"] . "\"," .
            "\"store_url\":\"" . $url . "\"},";
       $j++; 
    }
	$i++;
}
$page_show = $j;
$json = rtrim($json, ",");
//echo $json;
echo '{"page_sum":' . $page_sum . ',"page_show":' . $page_show . ',"data":[' . $json . ']}';
