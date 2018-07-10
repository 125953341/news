<?php
header("content-type:text/html;charset=utf-8");
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","test");
if($conn){
    $sql="delete from news where id ='$id' ";
    $que=mysqli_query($conn,$sql);
    if($que){
        echo"<script>alert('删除成功，返回首页');location.href='news.php';</script>";
    }else{
        echo "<script>alert('删除失败');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;
    }
}die("数据库连接失败" .mysqli_connect_error());
?>