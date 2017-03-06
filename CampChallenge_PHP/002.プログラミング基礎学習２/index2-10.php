<?php
// クエリの取得と表示
echo "入力された値：".$_GET['n'];

// 2,3,5,7の素数がそれぞれ何回登場したかを格納する変数
$num = $_GET['n'];
$n2 = 0;
$n3 = 0;
$n5 = 0;
$n7 = 0;

while($num%2==0) {
    $num = $num / 2;
    $n2 += 1;
}
while($num%3==0) {
    $num = $num / 3;
    $n3 += 1;
}
while($num%5==0) {
    $num = $num / 5;
    $n5 += 1;
}
while($num%7==0) {
    $num = $num / 7;
    $n7 += 1;
}
echo "その数の素数は";
if ($n2 >= 1) {
    echo "2,";
}
if ($n3 >= 1) {
    echo "3,";
}
if ($n5 >= 1) {
    echo "5,";
}
if ($n7 >= 1) {
    echo "7,";
}
