<?php
include_once "../connect.php";
$product_class = $_POST['class'];
$product_page = $_POST['page'];


//单页面展示产品数
$page_show = 6;

//获得数量
$sqlsum = "SELECT count(*) from product WHERE product_class='{$product_class}' ORDER BY product_addtime DESC";
$sum = mysqli_fetch_row(mysqli_query($link, $sqlsum))[0];

$sql = "SELECT * from product  WHERE product_class='{$product_class}' ORDER BY product_addtime DESC";
$result = mysqli_query($link, $sql);

if($product_class=='全部产品'){
$sqlsum = "SELECT count(*) from product ORDER BY product_addtime DESC";
$sum = mysqli_fetch_row(mysqli_query($link, $sqlsum))[0];

$sql = "SELECT * from product  ORDER BY product_addtime DESC";
$result = mysqli_query($link, $sql);  
}

$product_start = ($product_page - 1) * $page_show;
$product_end = $product_start + $page_show;
if ($product_end > $sum) {
    $product_end = $sum;
}

$page_sum = ceil($sum / $page_show);

$i = 0;
$j = 0;
$json = "";
while ($row = mysqli_fetch_assoc($result)) {
    if (($i >= $product_start) & ($i < $product_end)) {
        $url = '/product/show_' . $row["product_id"] . '.html';
        switch ($row["product_type"]) {
            case '咖啡':
                $product_type_img_url = 'images/icon1.png';
                $product_type_img_alt = '咖啡';
                break;
            case '黑糖':
                $product_type_img_url = 'images/icon2.png';
                $product_type_img_alt = '黑糖';
                break;
            case '欧包':
                $product_type_img_url = 'images/icon3.png';
                $product_type_img_alt = '欧包';
                break;
            case '奶茶':
                $product_type_img_url = 'images/icon4.png';
                $product_type_img_alt = '奶茶';
                break;
            case '水果茶':
                $product_type_img_url = 'images/icon5.png';
                $product_type_img_alt = '水果茶';
                break;
        }

        $json = "{$json}" . "{\"product_img_url\":\"" . $row["product_img_url"] . "\",\"product_img_alt\":\"" . $row["product_img_alt"] . "\"," .
            "\"product_name\":\"" . $row["product_name"] . "\"," .
            "\"product_type_img_url\":\"" . $product_type_img_url . "\"," .
            "\"product_type_img_alt\":\"" . $product_type_img_alt . "\"," .
            "\"product_url\":\"" . $url . "\"},";
        $j++;
    }
    $i++;
}
$page_show = $j;
$json = rtrim($json, ",");
//echo $json;
echo '{"page_sum":' . $page_sum . ',"page_show":' . $page_show . ',"data":[' . $json . ']}';
