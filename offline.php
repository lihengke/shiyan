<?php
    //setcookie("userName","timeout",time()-100);
    session_unset();
    header("location:login.php");//重定向
?>