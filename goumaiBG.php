<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>show</title>
</head>
<body>
<h1 align="center">进货信息为：</h1><br/>
	<div align="center">
	<?php 
	   include 'DB.php';
	   $sql="select * from maihuo";
	   $res=selectDB($sql);
	?>
		<table border="1">
		<tr>
			<td>商品编号</td>
			<td>商品名</td>
			<td>商品数量</td>
			<td>商品单价</td>
			
		</tr>
	<?php 
    	if ($res!=0){
        	   foreach ($res as $key=>$value){
        	       echo "<tr>";
        	       foreach ($value as $key1=>$value1){
        	           echo "<td>".$value1."</td>";
        	       }
        	       echo "</tr>";
        	   }
    	   }
	?>
	</table>   
	<a href="download1.php">下载卖货报告</a>
	<a href="manager.php">返回首页</a>
	</div>
</body>
</html>