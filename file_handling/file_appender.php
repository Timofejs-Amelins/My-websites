<?php
    $new_file = fopen("new_file.txt", "a");
    fwrite($new_file, "I love going to Leicester College!");
    fclose($new_file);