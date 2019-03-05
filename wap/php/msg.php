<?php 
include_once("../../php/connect.php");

$clickplace="留言页留言框";
$source=$website."_wap";

@$name = htmlspecialchars(trim($_POST['name']));
@$phone = htmlspecialchars(trim($_POST['phone']));
@$reason = htmlspecialchars(trim($_POST['content']));


//各项数值判断

$checkphone=' /^1\d{10}$/';



if(empty($name)){
    echo "姓名不能为空！";
    exit;
}

if(empty($phone)){
    echo "手机不能为空";
    exit;
}

if(preg_match($checkphone,$phone)){
} else{
    echo "手机格式错误！";
    exit;
}

$sql_check = mysqli_query($link, "SELECT * FROM msg WHERE name='$name' AND phone='$phone'");

if (mysqli_num_rows($sql_check) != 0) {
    echo '您的信息已经记录,无需重复提交!';
    exit;
}


$sql=mysqli_query($link,"insert into msg(name,phone,question,source,clickplace)values('$name','$phone','$reason','$source','$clickplace')");
$result="提交成功";
mysqli_close($link);

echo $result;
?>