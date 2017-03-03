<?php
$num = 10;
function my_func(){
    global $num;
    $num *= 3;
    echo $num;
    static $local_num;
    $local_num ++;
    echo "<br>";
    echo "<br>";
}
for ($i=0; $i<20; $i++) {
    my_func();
}
