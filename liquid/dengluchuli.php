<?php
@session_start();
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
$_SESSION["uid"] = $uid;
$_SESSION["pwd"] = $pwd;
//require_once "./DBDA.class.php";
//$db = new DBDA();
$con = mysqli_connect('127.0.0.1','root','');
mysqli_query($con,"SET NAMES UTF8");
if(!$con)
	echo "数据库连接失败！";
else {
	$sql = "select * from user where username='{$uid}' and pwd='{$pwd}'";
	mysqli_select_db($con,"liquid");
	$result = mysqli_query($con,$sql);
	$rows = mysqli_num_rows($result);
	//$row = mysqli_fetch_array($result);
	if($rows) {
		//$_SESSION["uid"]=$uid;
		header("location:person.php");
		exit;
	}
	else {
		echo "<script>alert('用户名或密码错误!');</script>";
		echo "<meta http-equiv='Refresh' content='0;URL=login.html'>";
		@session_destroy();
	}
}
