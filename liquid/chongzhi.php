<!DOCTYPE html>
<html>
  <head>
    <title>充值</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  </head>
    
    <body>

    <!-- Page Wrapper -->
      <div id="page-wrapper">

        <!-- Header -->
          <header id="header">
            <h1><a href="index.html">Liquid</a></h1>
            <nav id="nav">
              <ul>
                <li class="special">
                  <a href="#menu" class="menuToggle"><span>选项</span></a>
                  <div id="menu">
                    <ul>
											<li><a href="index.html">Liquid 首页</a></li>
											<li><a href="aboutus.html">关于 Liquid</a></li>
                                            <li><a href="gamelist.html">游戏榜单</a></li>
											<?php
												@session_start();
												if($_SESSION)
												{
													$uid = $_SESSION["uid"];
													echo '<li><strong><span class="blackhl">Welcome, </span>' . '<span class="redhl">' . $uid . '</span></strong></li>';
                                                    echo '<li><a href="person.php">&nbsp;&nbsp;&nbsp;&nbsp;个人中心</a></li>';
													echo '<li><a href="shopping_list.php">&nbsp;&nbsp;&nbsp;&nbsp;购买游戏</a></li>';
                                                    echo '<li><a href="gowuche.php">&nbsp;&nbsp;&nbsp;&nbsp;我的购物车</a></li>';
													echo '<li><a href="logoff.php">&nbsp;&nbsp;&nbsp;&nbsp;退出登录</a></li>';
												}
												else
												{
													echo '<li><a href="regindex.html">注册账号</a></li>';
													echo '<li><a href="login.html">登录账号</a></li>';
												}
											?>
										</ul>
                  </div>
                </li>
              </ul>
            </nav>
          </header>

        <!-- Main -->
          <article id="main">
            <header>
              <h2>把钱都交出来！</h2>
                        </header>
                        <section class="wrapper style5">
                          <div class="inner">
                              <section>
                                <div class="table-wrapper">


<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
$cash = $_POST['cash'];
if(!$con)
  echo "数据库连接失败！";
else{
  $sql1 = "select money from user where username = '{$uid}'";
  
  mysqli_select_db($con,"liquid");
  $result1=mysqli_query($con,$sql1);
  $rows1=mysqli_fetch_array($result1);
  $premoney=$rows1['money'];
  $nowmoney=$rows1['money']+$cash;
  $result=mysqli_query($con,"update user set money= '{$nowmoney}' where username='{$uid}'");
  mysqli_close($con);
  if($result)
  {
    echo "<script>alert('充值成功！您的余额是：".$nowmoney."');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=gowuche.php'>";
    exit;
  }
  	
  else{
  	echo "<script>alert('充值失败！请重试！');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=chongzhi.php'>";
    exit;
  }
}
?>

<a href="gowuche.php" class="button special small" rel="external nofollow" >查看购物车</a>
                                    </div>
                                  </section>
                </div>
                            </section>
          </article>

        <!-- Footer -->
          <footer id="footer">
            <ul class="icons">
              <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
              <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
              <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
              <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
              <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
             <li>&copy; 2018 Liquid</li>
            </ul>
          </footer>

      </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>
            
  </body>
</html>