<?php
header("content-type:text/html;charset=utf8");
$title=$_POST['title'];
$content=$_POST['content'];
$id=$_GET['id'];
$time=date("y-m-d h:i:s");
$conn=mysqli_connect("localhost","root","","test");
mysqli_set_charset($conn,"utf8");
if($conn){
    $sql="update news set title='$title',content='$content',time='$time' where id='$id'";
    $que=mysqli_query($conn,$sql);
    if($que){
        echo "<script>alert('修改成功');location.href='news.php';</script>";
    }else{
        echo "<script>alert('修改失败，请检查后在提交');Location.href='news.php';</script>";
    }
}
?>