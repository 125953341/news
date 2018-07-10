<?php
	$mysqli = new mysqli("localhost", "root", "", "test");

	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
		$sql="select * from loginuser";
	 $result=$mysqli->query($sql);
	 while ($row = mysqli_fetch_assoc($result))
	  {
	    echo "用户名: {$row['username']} <br>";
	    echo "密码: {$row['password']} <br>";
	  }
	 /* free result set */
	    $result->close();

    header("content-type:text/html;charset=utf8");
	$title=$_POST['title'];
	$content=$_POST['content'];
	$time=date("y-m-d H:i:s");
	mysqli_set_charset($mysqli,'utf8'); //设定字符集
	if($mysqli){
	 $sql= "insert into new(title,content,time) values('$title','$content','$time')";
	 $que=mysqli_query($mysqli,$sql);//执行sql语句
	 if($que){
	 echo "<script>alert('发布成功，返回新闻列表页');location.href='news.php';</script>";
	 }else{
	 echo "<script>alert('删除失败');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	 exit;
	 }
	}
	else{
	 die("数据库连接失败" .mysqli_connect_error());
	}
?>