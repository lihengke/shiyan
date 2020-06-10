<?php
    function selectDB($sql){
        $userAddress="127.0.0.1";
        $username="root";
        $userpassword="1234";
        $link=mysql_connect($userAddress,$username,$userpassword);//连接
        mysql_select_db("product",$link);//选择数据库
        $res=null;
        if(!mysql_errno($link)){//成功
            //$sql="select * from student";
            $result=mysql_query($sql) or die("sql_error");//执行sql语句
            while ($row=mysql_fetch_assoc($result)){
                $res[]=$row;
            }
            mysql_close($link);
            if ($res==null)
                return 0;
            else
                return $res;
        }else{
            echo "link_error";
            return 0;
        }
    }
    function selectNumDB($sql){
        $userAddress="127.0.0.1";
        $username="root";
        $userpassword="1234";
        $link=mysql_connect($userAddress,$username,$userpassword);//连接
        mysql_select_db("product",$link);//选择数据库
        $res=null;
        if(!mysql_errno($link)){//成功
            //$sql="select * from student";
            $result=mysql_query($sql) or die("sql_error");//执行sql语句 
            mysql_close($link);
            return mysql_num_rows($result);
        }else{
            echo "link_error";
            return 0;
        }
    }
    function updateDB($sql){
        $userAddress="127.0.0.1";
        $username="root";
        $userpassword="1234";
        $link=mysql_connect($userAddress,$username,$userpassword);//连接
        mysql_select_db("product",$link);//选择数据库
        $res=null;
        if(!mysql_errno($link)){//成功
            //$sql="select * from student";
            $result=mysql_query($sql) or die("sql_error");//执行sql语句
            mysql_close($link);
            return $result;
        }else{
            echo "link_error";
            return 0;
        }
    }
    function isExistDB($sno){
        $userAddress="127.0.0.1";
        $username="root";
        $userpassword="1234";
        $link=mysql_connect($userAddress,$username,$userpassword);//连接
        mysql_select_db("product",$link);//选择数据库
        $res=null;
        if(!mysql_errno($link)){//成功
            $sql="select count(*) from student where sno='".$sno."'";
            $result=mysql_query($sql) or die("sql_error");//执行sql语句
            mysql_close($link);
            $row=mysql_fetch_row($result);
            return $row[0];
        }else{
            echo "link_error";
            return 0;
        }
    }
    function insertOrUpdateOrDelete($sql){
        $link =  mysql_connect("127.0.0.1:3306","root","1234");
        if ($link){
            //选择数据库
            mysql_select_db("product",$link);
            if (mysql_errno()){
                echo "sql_error";
            }else{
                
                mysql_query($sql,$link) or die("run_error");
                mysql_close($link);
                return true;
    
            }
        }else{
            echo "<br/>link_error";
        }
        return false;
    }
?>