<?php
    $myfile = fopen("file.txt", "r") or die("Unable to open file!");
    echo fread($myfile, 5);
    fclose($myfile);