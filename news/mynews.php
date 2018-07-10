<?php
header("content-type:text/html;charset=utf8");
session_start();
$conn=mysqli_connect("localhost","root","","test");
mysqli_set_charset($conn,'utf8'); //设定字符集
$sql="select * from news";
$que=mysqli_query($conn,$sql);
if (isset($_SESSION['uid'])) {//判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
        $url='http://localhost:82/myweb/news/addnews.html';
        $user=$_SESSION["uid"];
    }
    else{
        $url='http://localhost:82/myweb/login/login.html';
        $user='请登录';
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>最新新闻</title>
    <style>
        table{
            margin-top: 10px;
        }
    </style>
</head>
<body>
<a href="<?php echo "$url"?>">发布新闻</a>
<a><?php echo "用户名  $user";?></a>
<a href="h
ttp://localhost:82/myweb/login/login.html">注销</a>
<table border="1" cellspacing="0" width=360 >
    <tr>
        <th>文章标题</th>
        <th>文章内容</th>
        <th>发布时间</th>
        <th>发布人</th>
    </tr>
    <?php
    while($row=mysqli_fetch_array($que)){
    ?>
    <tr>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['content']?></td>
        <td><?php echo $row['time']?></td>
        <td><?php echo $row['publisher']?></td>
        <?php }
        ?>
    </tr>
</table>
</body>
</html>