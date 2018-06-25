<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
mysqli_query($con,"SET NAMES UTF8");
$game = $_GET['game'];
if(!$con)
  echo "数据库连接失败！";
else {
  $sql = "delete from shoppinglist where gamename='{$game}'";
  mysqli_select_db($con,"liquid");
  $result = mysqli_query($con,$sql);
  mysqli_close($con);
  if($result) {
    echo "<script>alert('删除成功！');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=gowuche.php'>";
    exit;
  }
  else{
  	echo "<script>alert('删除失败！');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=gowuche.php'>";
    exit;
  }	
  echo "<a href='gowuche.php'>返回</a>";
}
?>