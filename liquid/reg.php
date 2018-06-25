<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<?php
if(isset($_POST["username"])){
	$username=$_POST["username"];
	$pwd=$_POST["pwd"];
	$confirm=$_POST["confirm"];
	if($pwd!=$confirm) {
		echo "<script>alert('请检查两次密码是否相同！');history.go(-1);</script>";
		exit;
	}
	$link=mysqli_connect("localhost","root");
	$sql="insert into user (username,pwd,money) values ('$username','$pwd','0')";
	mysqli_select_db($link,'liquid');
	$result=mysqli_query($link,"select username from user where username='$username'");
	if($num=mysqli_num_rows($result) != 0){
		echo "<script>alert('此用户已存在！');history.go(-1);</script>";
		exit;
	}
	else{
		if($result=mysqli_query($link,$sql))
		{
			echo "<script>alert('注册成功。1 record added.');</script>";
			echo "<meta http-equiv='Refresh' content='0;URL=login.html'>";
			exit;
		}
		else
			echo "注册失败。";
	}
	mysqli_close($link);
}
else
	echo "提交失败！请重试。";
?>
<br/>
<a href="login.html">返回</a>
</body>