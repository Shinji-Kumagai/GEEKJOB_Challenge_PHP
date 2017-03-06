<?php
// クエリは
// 雑貨が"goods"
// 生鮮食品が"foods"
// その他が"others"
// です。
function n(){
    echo nl2br("\n");
}
// Names of goods
echo "1: 雑貨　　　１０００円";
n();
echo "2: 生鮮食品　２０００円";
n();
echo "3: その他　　３０００円";
n();
n();

// $goods = 1000;
// $foods = 2000;
// $other = 3000;

// Prices
$goods = $_GET['goods'] * 1000;
$foods = $_GET['foods'] * 2000;
$others = $_GET['others'] * 3000;
// echo $goods;
// echo $foods;
// echo $others;


echo "あなたは雑貨を".$_GET['goods']."個買いました。";
n();
echo "あなたは生鮮食品を".$_GET['foods']."個買いました。";
n();
echo "あなたはその他を".$_GET['others']."個買いました。";
n();
n();

// total prices
$total = $goods + $foods + $others;
echo "合計金額は".$total."円です。";
n();
n();
// 合計個数
$num = $_GET['goods'] + $_GET['foods'] + $_GET['others'];

$price_a = $total / $num;
echo "一個当たりの金額は".$price_a."円です。";
n();
n();
// エラーになった表示
// $total = $_GET['goods']*1000 + $_GET['foods']*2000 + $_GET['other']*3000;
$points;
if ($total >= 3000) {
    $points = $total * 0.04;
    echo "今回のポイント付与額：".$points;
}elseif ($total >= 5000) {
    $points = $total * 0.05;
    echo "今回のポイント付与額：".$points;
}
n();
n();
echo "毎度ありがとうございます。";
