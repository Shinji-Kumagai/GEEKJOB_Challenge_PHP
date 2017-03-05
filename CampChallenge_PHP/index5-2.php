<?php

$access_date = date("Y-m-d");
setcookie("LastLoginDate", $access_date);

$lastDate = $_COOKIE['LastLoginDate'];
echo "お帰りなさいご主人さま<br>";
echo "前回のログインは".$lastDate."ですね";
