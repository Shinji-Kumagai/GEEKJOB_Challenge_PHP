<?php
$file = fopen('write.txt', 'r');
$file_read = fgets($file);
echo $file_read;
fclose($file);
