<?php
function br(){
    echo nl2br("\n");
}
$a = 10;
$b = 3;
const A = 100;

echo $a + $b;
br();
$a = A - $a;
echo $a;
br();
echo $a -  A;
br();
echo $a * $b;
br();
echo  A / $a;
