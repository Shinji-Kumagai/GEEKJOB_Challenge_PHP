<?php
function write($a) {
    echo "$a<br>";
}
// page1
// <memo>
// timestanp
$stamp = mktime(0,0,0,1,1,2016);
echo $stamp."<br>";

echo date("Y/m/d H:i:s", $stamp);
$time = date("Y-m-d");
echo $time;
print date("Y年m月d日　H時i分s秒", strtotime("2016-01-01 00:00:00"));

$date = "2016-01-01 00:00:00";
echo strtotime($date);
echo "<br>";
// <memo>


// $stamp = mktime(19, 26, 26, 3, 4, 2017);
// // echo $stamp;
// write($stamp);
// $today = date("Y/M/D");
// echo $today;
// echo"<br>";
//
// $today = date("y/m/d");
// echo $today;
// echo"<br>";
// echo"<br>";
// // var_dump($today);
//
// $today_j = date("Y年m月d日");
// echo $today_j;
// echo"<br>";
//
// $info_d = getdate();
// echo implode(", ", $info_d);
//

// $date2 = getdate($stamp);
// echo $date2;

// page2;
// $stamp = mktime(0, 0, 0, 10, 1, 2015);
// write($stamp);
// $sum1 = $stamp + (24 * 60 * 60);
// write($sum1);
// $diff1 = $stamp - (100 * 24 * 60 * 60);
// write($diff1);
//
// $today = date("Y-m-d H:i:s");
// write($today);
// $add_d = strtotime("+1 day", strtotime($today));
// $time = strtotime("+1 week 2 days 4 hours 2 secounds");
// write($add_d);
// write($time);
//
// $sum1 != $diff1


// page3
// echo strlen("あああ");
// echo mb_strlen("あああ");
// echo substr("abcdef", 3, 2);
// echo mb_substr("あいうえお", 3, 2);
// // echo
// echo strcmp("AAAA", "あああ");
//
// page4;
//
// $school = "Kanda Institude of Foreign Languages";
// // echo strpos("Kumagai", "g");
// // echo strstr($school, "of");
// // echo str_replace("Kanda", "Waseda", $school);
// $ex = explode(" ", $school);
// // 配列になる
// // var_dump($ex);
// // echo $ex;
// $im = implode("",$ex);
// echo $im;
// // echo implode(" " , $ex);

// page5;
// $file = fopen("read.txt", "r");
// $file_read = fgets($file);
// $file_read2 = file_get_contents("read.txt");
// fclose($file);
// echo $file_read;
// echo $file_read;
// echo $file_read2;
//
// $file = fopen("write.txt", "a");
// fwrite($file, "Hello?");
// fwrite($file, "こんいちわ?");
// fclose($file);
