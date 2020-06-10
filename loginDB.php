<?php
        include 'DB.php';
        session_start();
        $vlidcode=$_SESSION["vlidcode"];
        $code=$_POST["code"];
        if($vlidcode!=$code){
            echo "code_error<br>";
            echo "<a href='login.php'>return...</a>";
            return;
        }
        $userName=$_POST["userName"];
        $password=$_POST["password"];
        $sql="select * from info where id='".$userName."' and password='".$password."'";
        echo $sql;
        $res=selectDB($sql);
        if($res!=0){
          
            $_SESSION["userName"]=$userName;
            
                $sql="select * from info where id='".$userName."'";
                $res=selectDB($sql);
                echo "<br/>权限为：";
                echo $res[0]["right"];
                if ($res[0]["right"]==1){header("location:yuangong.php");}else {header("location:manager.php");}
            //header("location:manager.php");
        }else{
            header("location:login.php");
        }
    
    
?>