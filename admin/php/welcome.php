<?php
include_once("connect.php");
include('identify.php');
$news_click_all=0;

$sql = "SELECT count(*) FROM news";
$sqlfinish = mysqli_query($link,$sql);
while($row=mysqli_fetch_array($sqlfinish)){
    $news_sum=$row["count(*)"]; 
}



$sql = "SELECT count(*) FROM msg";
$sqlfinish = mysqli_query($link,$sql);
while($row=mysqli_fetch_array($sqlfinish)){
    $msg_sum=$row["count(*)"];
}


  
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/xadmin.css">
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo $admin_name; ?></span>！当前时间:<?php echo date('Y-m-d h:i:s', time()); ?></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">

                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>新闻数</h3>
                                                <p>
                                                    <cite><?php echo $news_sum;?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>留言数</h3>
                                                <p>
                                                    <cite><?php echo $msg_sum;?></cite></p>
                                            </a>
                                        </li>

                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td >
                                <a class="x-a" href="/" target="_blank">欢迎访问后台管理系统</a>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <a class="x-a" href="/" target="_blank">后台管理系统上线了</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>
                                <a href="http://www.starkingscoffee.com/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>网络推广中心</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        
    </div>

    </body>
</html>