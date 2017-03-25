<?php
// クッキーに現在時刻を記録し、次にアクセスした際に、前回記録した日時を表示してください。

// date_default_timezone_set('Asia/Tokyo');
$now = date('Y-m-d h:i:s');
setcookie('LastLoginDate', $now);
echo 'こんにちは<br>';
if (isset($_COOKIE['LastLoginDate'])) {
    $lastDate = $_COOKIE['LastLoginDate'];
    echo "前回のログインは ".$lastDate ."です。";
}
?>
