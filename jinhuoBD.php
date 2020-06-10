
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>进货成功界面</title>
</head>
<body>
<div>
<?php
   
        include 'DB.php';
       
        $sno=$_POST["sno"];
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $sql="select * from shangjia where kno='".$sno."' and kname='".$name."'";
       
        $res=selectDB($sql);
        if($res!=0){
            echo "可以进货<br/>";
            $sql="select * from student where sno='".$sno."' and sname='".$name."'";
          
            $res=selectDB($sql);
            if($res!=0){
                echo "原表有货<br/>";
                $sql="select * from student where sno='".$sno."'";
                $res=selectDB($sql);
                //echo $res[0]["phone"];
                //echo "<br/>";
                //echo $_POST["phone"];
                $phone=$_POST["phone"]+$res[0]["phone"];
                //echo "<br/>";
                //echo $_POST["phone"];
                $sql="update student set sname='".$name."',phone='".$phone."' where sno='".$sno."'";
                //$sql="update student set sname='".$sname."',phone='".$phone."',price='".$price."' where sno='".$sno."'";
                updateDB($sql);
                echo "进货成功<br/>";
                
                
                ///连接数据库
                //"127.0.0.1:3333"代表数据库所在电脑的IP和端口号
                //root表示数据库用户名
                //jerrycjr8023是root用户的密码
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
                            $sql = "insert into jinhuo(jno,jname,phone)values('".$sno."','".$name."','".$_POST["phone"]."')";
                            mysql_query($sql,$link) or die("SQL语句执行失败");//此函数可以执行  select,update,delete,insert语句
                            //关闭数据库连接
                            echo "<br/>保存成功";
                        
                        mysql_close($link);
                
                    }
                }else{
                    echo "<br/>数据库连接失败";
                }
                
                
                
                echo "进货后为：<br/>";
               
                $sql="select * from student where sno='".$sno."'";
                $res=selectDB($sql);
                ?>
                		<table border="1">
                		<tr>
                			<td>商品编号</td>
                			<td>商品名</td>
                			<td>商品数量</td>
                			<td>商品价格</td>
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
              <?php
            }else{
                session_start();
                $_SESSION["sno"]=$sno;
                    header("location:jinhuoSB1.php");
        }
        }else{
            header("location:jinhuoSB.php");
        }
    
    

        ?>
  
    </div>
</body>
</html>