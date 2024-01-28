<?php
    $new_file = fopen("new_file.txt", "w");
    fwrite($new_file, "abcdefghijklmnopqrstuvwxyz\n");
    fclose($new_file);

