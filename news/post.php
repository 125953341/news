<?php
    header("content-type:text/html;charset=utf8");
    session_start();
	$title=$_POST['title'];
	$content=$_POST['content'];
	$time=date("y-m-d H:i:s");
	$publisher=$_SESSION["uid"];
	$mysqli = mysqli_connect("localhost", "root", "", "test");
	mysqli_set_charset($mysqli,'utf8'); //设定字符集
	if($mysqli){
	echo $_SESSION["uid"];
	
	 $sql= "insert into news(title,content,time,publisher) values('$title','$content','$time','$publisher')";
	 $que=mysqli_query($mysqli,$sql);//执行sql语句
	 echo "$title,$content,$sql";//调试
		 if($que){
		 	echo "<script>alert('发布成功，返回新闻列表页');location.href='news.php';</script>";
		 }else{
			 echo "<script>alert('发布失败');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			 exit;
		 }
	}
	else{
	 die("数据库连接失败" .mysqli_connect_error());
	}
?>