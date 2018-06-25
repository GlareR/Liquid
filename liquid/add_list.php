<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
mysqli_query($con,"SET NAMES UTF8");
$game = $_GET['game'];
$price = $_GET['price'];
if(!$con)
	echo "数据库连接失败！";
else {
	$sql = "insert into shoppinglist values ('".$uid."','".$game."','".$price."')";
	mysqli_select_db($con,"liquid");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	if($result) {
    	echo "<script>alert('成功加入购物车！');</script>";
    	echo "<meta http-equiv='Refresh' content='0;URL=shopping_list.php'>";
    	exit;
    }
	else {
    	echo "<script>alert('您已经拥有！');</script>";
    	echo "<meta http-equiv='Refresh' content='0;URL=shopping_list.php'>";
    	exit;
  	}	
  	echo "<a href='shopping_list.php'>返回</a>";
}
?>