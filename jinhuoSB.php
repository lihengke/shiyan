<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>进货失败界面</title>
</head>
<body>
<h1 align="center">商家不提供此货物</h1><br/>
<h2>商家提供的货物有：</h2><br/>
	<?php 
	   include 'DB.php';
	   $sql="select * from shangjia";
	   $res=selectDB($sql);
	?>
		<table border="1">
		<tr>
			<td>商品编号</td>
			<td>商品名</td>
			
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
	</table> <br/><br/>  
	<a href="jinhuo.php">返回进货界面</a>
</body>
</html>