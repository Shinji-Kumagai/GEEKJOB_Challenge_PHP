<?php

$access_date = date("Y-m-d H:i:s");
setcookie("LastLoginDate", $access_date);

$lastDate = $_COOKIE['LastLoginDate'];
echo "お帰りなさいご主人さま<br>";
$now = date('Y-m-d H:i:s');
echo "ただ今の時刻は".$now."<br>";
echo "前回のログインは".$lastDate."ですね";

// ①スタート
// ②変数に二日を記入。
// ➂クッキーを設定。
// ④変数にクッキーを格納。
// ⑤変数に現在の時刻を記入。
