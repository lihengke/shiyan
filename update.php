<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>show</title>
</head>
<body>
<?php
    include 'DB.php';
    $sno=$_POST["sno"];
    $sname=$_POST["name"];
    $phone=$_POST["phone"];
    $price=$_POST["price"];
    //echo $price;
    $sql="update student set sname='".$sname."',phone='".$phone."',price='".$price."' where sno='".$sno."'";
    //echo $sql;
    updateDB($sql);
    header("location:index.php");
?>
</body>
</html>