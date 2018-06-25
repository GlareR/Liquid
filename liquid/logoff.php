<?php
@session_start();
@session_destroy();
//$_SESSION["uid"]="";
//$_SESSION["pwd"]="";
echo "<script>alert('您已注销！')</script>";
echo "<meta http-equiv='Refresh' content='0;URL=index.html'>";
?>