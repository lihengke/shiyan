<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>index</title>
</head>
<body>
	<?php include 'DB.php';?>
	<?php
	session_start();
	if (isset($_SESSION["userName"])){
	    $userName=$_SESSION["userName"];
	    $name="";
	   $sno="";
	   $sql="select * from student where 1=1";
	   if (isset($_POST["sno"])&&$_POST["sno"]!=""){
	       $sno=$_POST["sno"];
	       $sql=$sql." and sno='".$_POST["sno"]."'";
	   }
	   if (isset($_POST["name"])&&$_POST["name"]!=""){
	       $name=$_POST["name"];
	       $sql=$sql." and sname like '".$_POST["name"]."'";
	   }
	   $num=selectNumDB($sql);
	   $pagemax=2;
	   $pagenum=ceil($num/$pagemax);
	   $page=1;
	   if (isset($_GET["page"])){
	       if ($_GET["page"]<=0)
	           $page=1;
	       elseif ($_GET["page"]>=$pagenum)
	           $page=$pagenum;
	       else
	           $page=$_GET["page"];
	   }
	   $offset=($page-1)*$pagemax;
	   $sql=$sql." limit ".$offset.",2";
	   $res=selectDB($sql);	   
	?>
		<form action="index.php" method="post">
			商品编号：<input type="text" name="sno" value="<?php echo $sno;?>" >
			商品名：<input type="text" name="name" value="<?php echo $name;?>" >
			<input type="submit" value="查询商品">
		</form>				
	   <table border="1">
    		<tr>
    			<td>商品编号</td>
    			<td>商品名</td>
    			<td>当前库存</td>
    			<td>价格</td>
    			
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
    	<tr><td colspan="6">当前共查询到<?php echo $num;?>条记录|第<?php echo $page;?>页，共<?php echo $pagenum;?>页|<a href="index.php?page=<?php echo $page-1;?>">上一页</a>|<a href="index.php?page=<?php echo $page+1;?>">下一页</a></td></tr>
    	</table>
    	<?php 
    	
    	$sql="select * from info where id='".$userName."'";
    	$res=selectDB($sql);
    	echo "<br/>权限为：";
    	
    	if ($res[0]["right"]==1){
    	echo "店员";?>
    	    <a href="yuangong.php">返回首页</a><br>
    	<?php }else {
    	    echo "店长";
    	    ?>
    	    
    	        	    <a href="manager.php">返回首页</a><br>
    	        	<?php 
    	}
    	}else {
    	    echo "请先登陆...";
    	}
    	?>
</body>
</html>
