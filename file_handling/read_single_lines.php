<?php
    $myfile = fopen("file.txt", "r");
    while (!feof($myfile)) {
        echo fgets($myfile) . "<br>"; 
    }
    fclose($myfile);