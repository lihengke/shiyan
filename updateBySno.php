<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>index</title>
</head>
<body>
<?php
    include 'DB.php';
    if (isset($_GET["sno"])){
        $sno=$_GET["sno"];
        $sql="select * from student where sno='".$sno."'";
        $res=selectDB($sql);
        
?>
		<form action="update.php" method="post">
			商品编号：<input type="text" name="sno" value="<?php echo $res[0]["sno"];?>"><br>
			商品名：<input type="text" name="name" value="<?php echo $res[0]["sname"];?>"><br>
			当前库存：<input type="text" name="phone" value="<?php echo $res[0]["phone"];?>"><br>
			价格：<input type="text" name="price" value="<?php echo $res[0]["price"];?>"><br>
			<input type="submit" value="提交">
		</form>
<?php
    }else{
        header("location:index.php");
    }
?>
</body>
</html>