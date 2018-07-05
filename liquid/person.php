<!DOCTYPE html>
<html>
	<head>
		<title>Self Center</title>
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
							<h2>个人中心</h2>
                        </header>
                        <section class="wrapper style5">
                        	<div class="inner">
                            	<section>
                            		<div class="table-wrapper">



<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
mysqli_query($con,"SET NAMES UTF8");
if(!$con)
  echo "数据库连接失败！";
else{
  $sql = "select gamename from usergame where username = '{$uid}'";
  mysqli_select_db( $con,"liquid");
  $result = mysqli_query($con,$sql);
  //$rows = mysqli_num_rows($result);
  $sql2 ="select money from user where username = '{$uid}'";
  $result2 = mysqli_query($con,$sql2);
  
  $row2=mysqli_fetch_array($result2);
  //$row=mysqli_fetch_array($result);
  $len=mysqli_num_rows($result);
  mysqli_close($con);
  if($len)
  {
  	echo "<h3>当前您拥有的游戏：</h3>";
    echo "<table class='alt'>";     //使用表格格式化数据
    echo "<thead>"; 
    echo "<tr>";
	echo "<th>游戏名</th>";
	echo "</tr>";
	echo "</thead>";
  	while($row=mysqli_fetch_array($result))
  	{
	  echo "<tbody>";
      echo "<tr>"; 
      echo "<td>".$row['gamename']." </td>";  
      echo "</tr>";
	  echo "</tbody>";
  	}
  	echo "</table>";
	echo "<section>";
	echo "<ul class='actions'>";
	echo "<li>";
	echo "</li>";
	if($result2)
  	{
  		echo "<h3>您的账户余额：</h3>";
  		echo "<h3>". $row2['money']."</h3>";
  	}

  }
  else
  {
  	echo "<h3>您目前没有购买游戏</h3>";
  	if($result2)
  	{
  		echo "<h3>您的账户余额：</h3>";
  		echo "<h3>". $row2['money']."</h3>";
  	}
  }
}
?>
<a href="chongzhi.html" class="button special small" rel="external nofollow" >充值</a>
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
