<?php
// セッションに現在時刻を記録し、次にアクセスした際に、前回記録した日時を表示してください。

session_start();

echo "こんにちは<br>";

$now = date('Y-m-d h:i:s');

echo "ただ今の時刻は$now<br>";

if (isset($_SESSION['loginTime'])) {
    echo "前回のログインは";
    echo $_SESSION['loginTime'];
}

$_SESSION['loginTime'] = $now;
 ?>
