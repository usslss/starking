<?php
include "../connect.php";
include "../imgcut.php";

$img_source = $website;


$news_title = htmlspecialchars($_POST["news_title"]);
$news_summary = htmlspecialchars($_POST["news_summary"]);
$news_img_alt = htmlspecialchars($_POST["news_img_alt"]);
if (isset($_POST["editorValue"])) {
    $news_all = $_POST["editorValue"];
} else {
    $news_all = " ";
}

$news_click = "0";

$img_class = "news";

//pc端图片上传
if ($_FILES["file_pc"]["error"]) {
    if ( $_FILES["file_pc"]["error"] == 1) {
        echo "文件过大";
        exit;
    }
} else {
    //没有出错
    //大小不超过1024000B
    if ( $_FILES["file_pc"]["size"] >= 1024000) {
        echo "文件大于1MB";
        exit;
    }
    //判断上传文件类型为png或jpg
    if (($_FILES["file_pc"]["type"] == "image/png" || $_FILES["file_pc"]["type"] == "image/jpeg") && $_FILES["file_pc"]["size"] < 1024000) {
        //防止文件名重复
        $string = $_FILES["file_pc"]["name"];
        $array = explode('.', $string);
        $filename_pc_random = rand(1000, 9999);
        $filename_pc_gbk = date('ymd_His', time()) . "_" . $filename_pc_random . "." . $array[1];
        $file_pc_url = "../../../images/news/" . $filename_pc_gbk;
        $img_pc_url = "images/news/" . $filename_pc_gbk;
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename_pc = iconv("UTF-8", "gb2312", $file_pc_url);
        //检查文件或目录是否存在
        if (file_exists($filename_pc)) {
            echo "该文件已存在";
        } else {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file_pc"]["tmp_name"], $filename_pc); //将临时地址移动到指定地址
        }
    } else {
        echo "文件类型不对";
        exit;
    }
    // 裁剪pc图片
    if (isset($file_pc_url)) {

        $source = $file_pc_url;

        $width = 167; // 裁剪后的宽度
        $height = 113; // 裁剪后的高度
        // 裁剪后的图片存放目录
        $target = $file_pc_url;

        image_center_crop($source, $width, $height, $target);
    }

}

//移动端的图片的上传
if ($_FILES["file_wap"]["error"]) {
    if ( $_FILES["file_wap"]["error"] == 1) {
        echo "文件过大";
        exit;
    }
} else {
    //没有出错
    //大小不超过1024000B
    if ( $_FILES["file_wap"]["size"] >= 1024000) {
        echo "文件大于1MB";
        exit;
    }
    if (($_FILES["file_wap"]["type"] == "image/png" || $_FILES["file_wap"]["type"] == "image/jpeg") && $_FILES["file_wap"]["size"] < 1024000) {
        //防止文件名重复
        $string = $_FILES["file_wap"]["name"];
        $array = explode('.', $string);
        $filename_wap_random = rand(1000, 9999);
        if (isset($filename_pc_random)) {
            if ($filename_wap_random == $filename_pc_random) {
                $filename_wap_random = $filename_wap_random + 1;
            }
        }
        $filename_wap_gbk = date('ymd_His', time()) . "_" . $filename_wap_random . "." . $array[1];
        $file_wap_url = "../../../wap/images/news/" . $filename_wap_gbk;
        $img_wap_url = "images/news/" . $filename_wap_gbk;

        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename_wap = iconv("UTF-8", "gb2312", $file_wap_url);
        //检查文件或目录是否存在
        if (file_exists($filename_wap)) {
            echo "该文件已存在";

        } else {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file_wap"]["tmp_name"], $filename_wap); //将临时地址移动到指定地址
        }
    } else {
        echo "文件类型不对";
        exit;
    }
    // 裁剪wap图片
    if (isset($file_wap_url)) {

        $source = $file_wap_url;

        $width = 167; // 裁剪后的宽度
        $height = 113; // 裁剪后的高度
        // 裁剪后的图片存放目录
        $target = $file_wap_url;

        image_center_crop($source, $width, $height, $target);

    }
}

if (!isset($file_pc_url)) {
    $img_pc_url = "";
}
if (!isset($file_wap_url)) {
    $img_wap_url = "";
}
$sql_news = "INSERT INTO news (news_title, news_summary, news_all, news_click, news_website,news_img_url,news_wap_img_url,news_img_alt) VALUES('{$news_title}', '{$news_summary}', '{$news_all}', '{$news_click}', '{$website}','{$img_pc_url}','{$img_wap_url}','{$news_img_alt}')";
$sqlfinish = mysqli_query($link, $sql_news);

echo "添加新闻成功";

mysqli_close($link);
