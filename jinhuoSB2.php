<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Insert title here</title>
	</head>
	<body>
		<?php 
		  //获得表单数据:
		  $sno = $_POST["sno"];
		  $name = $_POST["name"];
		  $phone = $_POST["phone"];
		  $price = $_POST["price"];
		 
		  
		  
		  echo "<br/>".$sno;
		  echo "<br/>".$name;
		  echo "<br/>".$phone;
		  echo "<br/>".$price;
		
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
		        $rows = mysql_num_rows($result);//获得查询结果的记录数
		        echo "学号在表中的记录数为:".$rows;
		        if ($rows>0){
		            echo "<br/>学号已存在";
		        }else{
		        
		          //编写SQL语句，再执行SQL
		          //SQL语句中的学号，姓名等应该是表单中填写的数据
		           $sql = "insert into student(sno,sname,phone,price)values('".$sno."','".$name."','".$phone."','".$price."')";
		           mysql_query($sql,$link) or die("SQL语句执行失败");//此函数可以执行  select,update,delete,insert语句
		         //关闭数据库连接
		          echo "<br/>保存成功";
		        }
		        mysql_close($link);
		      
		      }
		  }else{
		      echo "<br/>数据库连接失败";
		  }
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
		  
		  
		?>
		<a href="manager.php">返回首页</a>
	</body>
	
	
</html>