<?php
    header("content-type:image/jpeg");
    $image=imagecreate(100, 30);
    $bcolor=imagecolorallocate($image, 255, 255, 0);    
    imagefilledrectangle($image, 0, 0, 100, 30, $bcolor);
    $color1=imagecolorallocate($image, 0, 255, 0);
    $array=array("a","b","c","1","2","3");
    $a=$array[rand(0,5)];
    $b=$array[rand(0,5)];
    $c=$array[rand(0,5)];
    $d=$array[rand(0,5)];
    imagestring($image, 5, 20, 10, $a, $color1);    
    imagestring($image, 5, 40, 10, $b, $color1);
    imagestring($image, 5, 60, 10, $c, $color1);
    imagestring($image, 5, 80, 10, $d, $color1);
    $vlidcode=$a.$b.$c.$d;
    session_start();
    $_SESSION["vlidcode"]=$vlidcode;
    imagejpeg($image);
    imagedestroy($image);
    

?>