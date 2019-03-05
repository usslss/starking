<?php
include_once "../connect.php";
$product_class = $_POST['class'];
$product_type = $_POST['type'];
$sql = "SELECT * from product WHERE product_class='{$product_class}' AND product_type='{$product_type}'";
$result = mysqli_query($link, $sql);
$i = 0;
$json = "";
while ($row = mysqli_fetch_assoc($result)) {
    $url = '/product/show_' . $row["product_id"] . '.html';
    $json = "{$json}" . "{\"product_img_url\":\"" . $row["product_img_url"] . "\",\"product_img_alt\":\"" . $row["product_img_alt"] . "\"," .
        "\"product_url\":\"" . $url . "\"},";
    $i++;
}
$json = rtrim($json, ",");
//echo $json;
echo '{"sum":"' . $i . '","data":[' . $json . ']}';
