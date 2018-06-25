<!DOCTYPE html>
<html>
	<head>
		<title>Shopping List</title>
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
							<h2>游戏列表</h2>
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
else{
  $sql = "select * from game ";
  $sqlgame1 = "select gamename from usergame where username = '{$uid}'";
  $sqlgame2 = "select gamename from shoppinglist where username = '{$uid}'";
  mysqli_select_db( $con,"liquid");
  $sql1res = mysqli_query($con,$sqlgame1);
  $sql2res = mysqli_query($con,$sqlgame2);
  $cant = array();
  if($sql1res or $sql2res){
  	while($have1 = mysqli_fetch_array($sql1res))
  	{	
  		array_push($cant,$have1['gamename']);

  	}
  	while($have2 = mysqli_fetch_array($sql2res))
  	{	
  		array_push($cant,$have2['gamename']);
  		// foreach ($cant as $key => $value) {
  		// 	echo $value;
  		// }
  	}
  }
  
  $result = mysqli_query($con,$sql);
  $rows = mysqli_num_rows($result);
  if($rows){
    //$_SESSION["uid"]=$uid; 
    //echo $rows[0][1];

    echo "<h3>当前有以下游戏正在出售</h3>";
    echo "<table class='alt'>";
	echo "<thead>"; 
    echo "<tr>";
	echo "<th>&nbsp;&nbsp;&nbsp;游戏名</th>";
	echo "<th>&nbsp;&nbsp;&nbsp;价格</th>";
	echo "<th>&nbsp;&nbsp;&nbsp;操作</th>";
	echo "</tr>";
	echo "</thead>";
	
    while($row=mysqli_fetch_array($result))  //遍历SQL语句执行结果把值赋给数组
    {
      $flag = False;
	  echo "<tbody>";
      echo "<tr>";
      echo "<td>".$row['gamename']."</td>";
      echo "<td>".$row['gameprice']."</td>";
      foreach ($cant as $key => $value) {
      	// echo $value;
      	// echo $row['gamename'];
      	// echo "<br/>";
      	// var_dump($value);
      	// var_dump($row['gamename']);

      	// $value1=(string)$value;
      	// $value2=(string)$row['gamename'];
      	if($value == $row['gamename'] )
      	{
      		$flag = True;
      	}
      }
      if(!$flag)
      {
      	echo "<td><a href='add_list.php?game=".$row['gamename']. "&price=".$row['gameprice']. "' class='button small'>加入购物车</a></td>";
      }
      else
      	echo "<td><a href='add_list.php?game=".$row['gamename']. "&price=".$row['gameprice']. "' class='button disabled'>加入购物车</a></td>";
      echo "</tr>";
	  echo "</tbody>";
      //$_SESSION["addgame"]=$;
    }
    echo "</table>";

  }
  else{
    echo "目前没有游戏上架";
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