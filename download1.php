<?php
    header("content-type:application/octet-stream");
    $filename="date.docx";
    if (is_file($filename)){
        $file=fopen($filename, "r");
        $fileheader=fread($file, filesize($filename));
        header("content-disposition:attachment;filename=报告.docx");
        print($fileheader);
    }
?>