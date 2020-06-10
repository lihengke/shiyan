<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>出货界面</title>
</head>
<body>
<h1 align="center" >欢迎来到出货界面</h1>
	<div align="center">
	<?php 
	   include 'DB.php';
	   $sql="select * from student";
	   $res=selectDB($sql);
	?>
		<table border="1">
		<tr>
			<td>商品编号</td>
			<td>商品名</td>
			<td>当前库存</td>
			<td>价格</td>
			<td>操作</td>
		</tr>
	<?php 
    	if ($res!=0){
        	   foreach ($res as $key=>$value){
        	       echo "<tr>";
        	       foreach ($value as $key1=>$value1){
        	           echo "<td>".$value1."</td>";
        	       }
        	       echo "<td><a href='deleteBySno.php?sno=".$value["sno"]."'>删除</a></td>";
        	       echo "</tr>";
        	   }
    	   }
	?>
	</table>   
	<a href="manager.php">返回首页</a>
	</div>
</body>
</html>
