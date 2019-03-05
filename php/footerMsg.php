<?php
include_once "connect.php";
include_once "foodMsg.php";

$clickplace = "PC底部留言";
$clickplace_food = "底部留言";
$source = $website.'_PC';

@$name = htmlspecialchars(trim($_POST['dataName2']));
@$phone = htmlspecialchars(trim($_POST['dataPhone2']));
@$content = htmlspecialchars(trim($_POST['dataContent2']));
$reason=$content;

//各项数值判断

$checkphone = ' /^1\d{10}$/';

if (empty($name)) {
    echo "姓名不能为空！";
    exit;
}

if (empty($phone)) {
    echo "手机不能为空";
    exit;
}

if (preg_match($checkphone, $phone)) {
} else {
    echo "手机格式错误！";
    exit;
}
$sql_check = mysqli_query($link, "SELECT * FROM msg WHERE name='$name' AND phone='$phone'");

if (mysqli_num_rows($sql_check) != 0) {
    echo '您的信息已经记录,无需重复提交!';
    exit;
}
foodMSG($name,$phone,$reason,2,$clickplace_food,$website,'PC');
$sql = mysqli_query($link, "insert into msg(name,phone,source,clickplace,question)values('$name','$phone','$source','$clickplace','$reason')");
$result = "提交成功";
mysqli_close($link);
echo $result;
