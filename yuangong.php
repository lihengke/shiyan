<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>员工界面</title>
</head>
<body>
	<?php
	   session_start();
	   if (isset($_SESSION["userName"])){
	?>
	<?php 
    	   $userName=$_SESSION["userName"];
    	   echo "尊敬的员工".$userName.",您好&nbsp;&nbsp;";
    	   echo "<a href='offline.php'>注销</a><hr>";
	?>			
        	
        	<a href="index.php">查看库存信息</a><br>
        	
        	<a href="chushou.php">商品出售</a><br>
        	
	<?php 
	   }else {
	       echo "请先登陆...";
	   }
	?>
</body>
</html>