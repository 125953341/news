<?php
header("content-type:text/html;charset=utf8");
@session_set_cookie_params(3600, "/", "http://localhost:82", false, TRUE); //保存session用户到整个域名内通用
session_start();
$link=mysqli_connect("localhost","root","","test");
if($link)
{
	$name=$_POST["usernamel"];
	$password=$_POST["passwordl"];
	if($name==""||$password=="")//判断是否为空
	{
	echo"<script type=text/javascript>window.alert('请填写正确的信息！');location.href='http://localhost:82/myweb/login/login.html';</script>";
	exit;
	}
	$str="select password from loginuser where username='$name'";
	mysqli_set_charset($link,'utf8'); //设定字符集0
	$result=mysqli_query($link,$str);
	$pass=mysqli_fetch_row($result);
	$pa=$pass[0];
	if($pa==$password)//判断密码与注册时密码是否一致
	{
		$_SESSION["uid"] = $name;
		echo"<script type=text/javascript>alert('登录成功！');location.href='http://localhost:82/myweb/news/addnews.html';</script>";
	}
	{  
		echo"<script type=text/javascript>window.alert('登录失败！');location.href='http://localhost:82/myweb/login/login.html';</script>";
	}	
}
?>