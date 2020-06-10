<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>购买界面</title>
</head>
<body>
<h1 align="center" >欢迎来到购买界面，请您选择您所购买的商品</h1>
	<div align="center">
	<?php 
	   include 'DB.php';
	   $sql="select * from student";
	   $res=selectDB($sql);
	?>
		<table border="1">
		<tr>
			<td>商品序号</td>
			<td>商品名</td>
			<td>商品数量</td>
			<td>商品价格</td>
			<td>操作价格</td>
		</tr>
	<?php 
    	if ($res!=0){
        	   foreach ($res as $key=>$value){
        	       echo "<tr>";
        	       foreach ($value as $key1=>$value1){
        	           echo "<td>".$value1."</td>";
        	       }
        	       echo "<td><a href='goumai.php?sno=".$value["sno"]."'>购买</a></td>";
        	       echo "</tr>";
        	   }
    	   }
	?>
	</table>   
	<a href="yuangong.php">返回首页</a>
	</div>
</body>
</html>
