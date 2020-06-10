<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>购买界面</title>
</head>
<body>
<h1 align="center" >欢迎来到购买确认界面，请您确认您所购买的商品</h1>
<?php
    include 'DB.php';
    if (isset($_GET["sno"])){
        $sno=$_GET["sno"];
        $sql="select * from student where sno='".$sno."'";
        $res=selectDB($sql);
        
?>
		<form action="goumaichuli.php" method="post">
			<table align="center">
				<tbody>
					<tr>
						<td>商品编号：</td>
						<td> <input type="text" name="sno" value="<?php echo $res[0]["sno"];?>"> </td>
					
						
					</tr>
					
					<tr>
						<td>商品名：</td>
						<td> <input type="text" name="name" value="<?php echo $res[0]["sname"];?>">  </td>
					
					</tr>
					
					<tr>
						<td> 价格:</td>
						<td><input type="text" name="price" value="<?php echo $res[0]["price"];?>">  </td>
				
					</tr>
					
					<tr>
						<td> 购买数目:</td>
						<td><input type="text" name="phone" placeholder="请输入购买商品数目">  </td>
				
					</tr>
					
					<tr>
						<td></td>
						<td> <input type="submit" value="确定购买" />   </td>
					</tr>
					
					
					
				</tbody>
				
			</table>
		</form>
<?php
    }else{
        header("location:goumai.php");
    }
?>



</body>
</html>