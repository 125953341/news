<?php
header("content-type:text/html;charset=utf8");
$link=mysqli_connect("localhost","root","","test");;//链接数据库
if($link)
  {  
      //echo"选择数据库成功！";
        $name=$_POST["username"];
        $password1=$_POST["password"];//获取表单数据
        $password2=$_POST["password2"];
        if($name==""||$password1=="")//判断是否填写
        {
          echo"<script type=text/javascript>window.alert('请填写完成！');location.href='http://localhost:82/myweb/login/register.html';</script>";
          exit;
        }
        if($password1==$password2)//确认密码是否正确
        {
        $str="select count(*) from loginuser where username='$name'";
        $result=mysqli_query($link,$str);
        $pass=mysqli_fetch_row($result);
        $pa=$pass[0];
        echo "$pa";
        if($pa==1)//判断数据库表中是否已存在该用户名
        {
         
        echo"<script type=text/javascript>window.alert('该用户名已被注册');location.href='http://localhost:82/myweb/login/register.html';</script>";
        exit; 
        }

        $sql="insert into loginuser (username,password) values('$name','$password1')";//将注册信息插入数据库表中
        //echo"$sql";
        mysqli_query($link,$sql);
        mysqli_set_charset($link,'utf8'); //设定字符集
        $close=mysqli_close($link);
        if($close)
        {
          //echo"数据库关闭";
          //echo"注册成功！";
          header('Location: http://localhost:82/myweb/login/return.html');   
        }
        }
        else
        {
          echo"<script type=text/javascript>window.alert('密码不一致！');location.href='http://localhost:82/myweb/login/register.html';</script>";  
        }
      
    }
  
?>