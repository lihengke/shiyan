
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>show</title>
</head>
<body>
	<?php
    include 'DB.php';
    $sno=$_GET["sno"];
    $sql="delete from student where sno='".$sno."'";
    updateDB($sql);
    echo "删除成功";
   
?>
	<a href="chuhuo.php">返回上一界面</a>
</body>
</html>