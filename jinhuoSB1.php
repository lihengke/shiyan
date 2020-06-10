<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>index</title>
</head>
<body>
<?php
    include 'DB.php';
    session_start();
    if (isset($_SESSION["sno"])){
        $sno=$_SESSION["sno"];
        $sql="select * from shangjia where kno='".$sno."'";
        $res=selectDB($sql);
        
?>
<h1 align="center">库存中不存在提供此货物，需要从商家进货</h1><br/>
		<form action="jinhuoSB2.php" method="post">
			商品编号：<input type="text" name="sno" value="<?php echo $res[0]["kno"];?>"><br>
			商品名：<input type="text" name="name" value="<?php echo $res[0]["kname"];?>"><br>
			需进商品数量：<input type="text" name="phone" placeholder="请输入需进商品数量"><br>
			商品单价：<input type="text" name="price"  placeholder="请输入商品单价"><br>
			<input type="submit" value="提交">
		</form>
<?php
    }else{
        header("location:index.php");
    }
?>
</body>
</html>