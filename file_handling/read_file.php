<?php
    echo fread(fopen("file.txt", "r"), filesize("file.txt"));