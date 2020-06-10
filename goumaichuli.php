<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>结算界面</title>
</head>
<body>
<?php
    include 'DB.php';
    $sno=$_POST["sno"];
    $sql="select * from student where sno='".$sno."'";
    $res=selectDB($sql);
    //echo $res[0]["phone"];"<br>";
    $sname=$_POST["name"];
    $phone=$res[0]["phone"]-$_POST["phone"];
    $price=$_POST["price"];
    //echo $_POST["phone"];
     //echo $phone;
    
    //echo $price;
    $sql="update student set sname='".$sname."',phone='".$phone."',price='".$price."' where sno='".$sno."'";
    //echo $sql;
    updateDB($sql);
    
    
    //header("location:index.php");
?>
<br>
<h3 align="center" >购买成功，本次您所购买的商品为：<?php echo $sname;?></h3><br>
<h3 align="center" >商品的单价为：<?php echo $price;?></h3><br>
<h3 align="center" >购买的商品数目为：<?php echo  $_POST["phone"];?></h3><br>
<h3 align="center" >需要支付的金额为：<?php echo  $_POST["phone"]*$price;?></h3><br>

<?php 

$link = mysql_connect("127.0.0.1:3306","root","1234");
if ($link){
    echo "<br/>数据库连接成功";
    //选择数据库，要选择student_db
    mysql_select_db("product",$link);
    //可以通过mysql_errno();
    if (mysql_errno($link)){
        echo "<br/>数据库选择失败,请确认student_db是否存在";
    }else{
        echo "<br/>数据库选择成功";

        //查询学号是否存在，存在则不允许添加学生信息
        $selectSQL = "select * from student where sno='".$sno."'";
        $result =  mysql_query($selectSQL,$link);


        //编写SQL语句，再执行SQL
        //SQL语句中的学号，姓名等应该是表单中填写的数据
        $sql = "insert into maihuo(mno,mname,phone,price)values('".$sno."','".$sname."','".$_POST["phone"]."','".$price."')";
        mysql_query($sql,$link) or die("SQL语句执行失败");//此函数可以执行  select,update,delete,insert语句
        //关闭数据库连接
        echo "<br/>保存成功";

        mysql_close($link);

    }
}else{
    echo "<br/>数据库连接失败";
}


echo "<br/>";

?>


<div align="center"><a href="yuangong.php">返回首页</a></div>

</body>
</html>