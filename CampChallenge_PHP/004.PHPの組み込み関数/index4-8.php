<?php
$a = "私の名前は熊谷です。";
$write = fopen('write.txt', 'w');
fwrite($write, $a);
fclose($write);
