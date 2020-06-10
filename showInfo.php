<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>show</title>
</head>
<body>
<h1 align="center">员工信息为：</h1><br/>
	<div align="center">
	<?php 
	   include 'DB.php';
	   $sql="select * from worker";
	   $res=selectDB($sql);
	?>
		<table border="1">
		<tr>
			<td>姓名</td>
			<td>性别</td>
			<td>年龄</td>
			<td>住址</td>
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
	<a href="manager.php">返回首页</a>
	</div>
</body>
</html>
