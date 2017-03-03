<?php
$val = "two";
$mes = " ";
switch($val) {
    case "one":
        $mes = "one";
        break;
    case "two":
        $mes = "two";
        break;
    default:
        $mes = "想定外";
        break;
}
echo $mes;
