<?php
function br(){
echo nl2br("\n"); //<br />タグが挿入される。
}

// クエリの取得と表示
echo "入力された値：".$_GET['n'];
br();
br();

// 2,3,5,7の素数がそれぞれ何回登場したかを格納する変数
$n2 = 0;
$n3 = 0;
$n5 = 0;
$n7 = 0;

$mult2 = 0;
$mult3 = 0;
$mult5 = 0;
$mult7 = 0;

// クエリを変数に格納
$num = $_GET['n'];

// switch($num) {
//     case %2==0:
//         $num = $num / 2;
//         $n2 += 1;
// }

while($num%2==0) {
    $num = $num / 2;
    $n2 += 1;
    // echo "num = " . $num;
    // echo ",   n2 = " . $n2;
    // br();
}
while($num%3==0) {
    $num = $num / 3;
    $n3 += 1;
    // echo "num = " . $num;
    // echo ",   n3 = " . $n3;
    // br();
}
while($num%5==0) {
    $num = $num / 5;
    $n5 += 1;
    // echo "num = " . $num;
    // echo ",   n5 = " . $n5;
    // br();
}
while($num%7==0) {
    $num = $num / 7;
    $n7 += 1;
    // echo "num = " . $num;
    // echo ",   n7 = " . $n7;
    // br();
}
echo "その数の素数は";
$n2_1 = "";
$n3_1 = "";
$n5_1 = "";
$n7_1 = "";
if ($n2 >= 1) {
    echo "2,";
    $mult2++;
    for ($i=1;$i<=$n2;$i++) {
        if ($i==1) {
            $n2_1 = 2;
        }elseif ($i>=1) {
            $n2_1 = $n2_1 . "*" . 2;
        }
    }
    // echo $n2_1;
}
if ($n3 >= 1) {
    echo "3,";
    $mult3++;
    for ($j=1;$j<=$n3;$j++) {
        if ($j==1) {
            $n3_1 = 3;
        }elseif ($j>=1) {
            $n3_1 = $n3_1 . "*" . 3;
        }
    }
}

if ($n5 >= 1) {
    echo "5,";
    $mult5++;
    for ($i=1;$i<=$n5;$i++) {
        if ($i==1) {
            $n5_1 = 5;
        }elseif ($i>=1) {
            $n5_1 = $n5_1 . "*" . 2;
        }
    }
}
if ($n7 >= 1) {
    echo "7,";
    $mult7++;
    for ($i=1;$i<=$n7;$i++) {
        if ($i==1) {
            $n7_1 = 7;
        }elseif ($i>=1) {
            $n7_1 = $n7_1 . "*" . 2;
        }
    }
}
// echo $num;
// $numはいま1になってるためそれも省く（最初の条件）！
if (($num!=1) and ($num%2!=0) and ($num%3!=0) and ($num%5!=0) and ($num%7!=0)) {
    echo "その他";
}
//
// br();
// echo $n2_1;
// br();
// echo $n3_1;
// br();
// echo $n5_1;
// br();
// echo $n7_1;
br();
br();

if (($n2 != 0) || ($n3 != 0) || ($n5 != 0) || ($n7 != 0)) {
    //三項演算子のかっこを忘れない
    echo $_GET['n'] . "=" . $num . ($mult2>0 ? "*": "") . $n2_1 . ($mult3>0 ? "*": "") .  $n3_1  . ($mult5>0 ? "*": "") . $n5_1 . ($mult7>0 ? "*": "") . $n7_1;
}
