<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
$value = $_GET['value'];
if(!$con)
  echo "数据库连接失败！";
else {
  $sql1 = "select gamename from shoppinglist where username = '{$uid}'";
  //$sql2 = "insert into usergame values ('{$uid}','{$game}')";
  mysqli_select_db($con,"liquid");
  $resultgms = mysqli_query($con,$sql1);
  if($resultgms) {
      $flag = 0;
      while($rows = mysqli_fetch_array($resultgms)) {
        $result = mysqli_query($con,"insert into usergame values ('{$uid}','".$rows['gamename']."')");
        if($result)
          $flag = 1;
        //echo "<br/> ".$uid.$rows['gamename'].$value ."<br/>";
      }
      if($flag == 1) {
        mysqli_query($con,"update user set money= {$value} where username ='{$uid}'");
        mysqli_query($con,"delete from shoppinglist where username = '{$uid}'");
        echo "<script>alert('交易成功！');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=shopping_list.php'>";
      }
      else {
        echo "<script>alert('交易失败！');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=pay.php'>";
      }
      mysqli_close($con);
  }
}
?>