<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>login</title>
</head>
<body>
	<?php
	   session_start();
	   if (isset($_SESSION["userName"])){
	?>
	<?php 
    	   $userName=$_SESSION["userName"];
    	   echo "尊敬的店长".$userName.",您好&nbsp;&nbsp;";
    	   echo "<a href='offline.php'>注销</a><hr>";
	?>			
        	<a href="showInfo.php">查看员工信息</a><br>
        	<a href="index.php">查看库存信息</a><br>
        	<a href="jinhuo.php">商品入库</a><br>
        	<a href="chuhuo.php">商品出库</a><br>
        	<a href="jinhuoBG.php">查看进货记录</a><br>
        	<a href="goumaiBG.php">查看购买记录</a><br>
	<?php 
	   }else {
	       echo "请先登陆...";
	   }
	?>
</body>
</html>
