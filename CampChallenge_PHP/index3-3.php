<?php
function my_function($a, $b=5, $type=false) {
    if ($type===false) {
        echo $a * $b;
    }elseif ($type===true) {
        echo ($a * $b) ** 2;
    }
}
my_function(2,6,True);
