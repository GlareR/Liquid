<!DOCTYPE html>
<html>
	<head>
		<title>Pay</title>
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
              			<h2>结账</h2>
                    </header>
                    <section class="wrapper style5">
                        <div class="inner">
                            <section>
                            	<div class="table-wrapper">

<?php
@session_start();
$uid = $_SESSION["uid"];
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
  	echo "数据库连接失败！";
else {
  	$sum = 0;
  	//echo "尊敬的".$uid."玩家,您的游戏";
  	$sql = "select * from shoppinglist where username = '{$uid}'";
  	$sql2 = "select money from user where username = '{$uid}'";
  	mysqli_select_db($con,"liquid");
 	  $result = mysqli_query($con,$sql);
  	$result2 = mysqli_query($con,$sql2);
  	$row2 = mysqli_fetch_array($result2);
  	$money = $row2['money'];
  	mysqli_close($con);
  	if($result) {
    	while($row = mysqli_fetch_array($result))
      		$sum += $row['gameprice'];
    	echo "<h3>尊敬的" . $uid . "玩家,您的游戏总价是：" . $sum . "</h3>";
    	echo "<br/><h3>您当前的余额是：" . $money . "</h3>";
   		//$money=(int)$money;
    	//$sum*=1;
    	if($money >= $sum) {
      		echo "<br/><h3>您当前的余额足够支付，您是否现在付款?</h3>";
      		$value = $money - $sum;
      		echo "<section>";
      		echo "<ul class='actions'>";
      		echo "<li>";
      		echo "<a href='deal.php?value={$value}'  class='button special small' rel='external nofollow'>付款</a>";
    	}
    	else {
      		echo "<br/><h3>余额不足，是否充值？</h3>";
      		echo "<section>";
      		echo "<ul class='actions'>";
      		echo "<li>";
      		echo "<a href='chongzhi.html' class='button special small' rel='external nofollow'>充值</a>";
      		echo "</li>";
    	}
  	}
  	else
    	echo "您购物车里没有东西";
  	echo "<li>";
  	echo "<a href='gowuche.php' class='button special small' rel='external nofollow'>返回</a>";
  	echo "</li>";
  	echo "</ul>";
  	echo "</section>";
}

?>


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
