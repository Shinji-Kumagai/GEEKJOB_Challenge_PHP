<?php
$logfile = "logfile.txt";
// ①処理の経過を書き込むログファイルの作成
$write_file = fopen($logfile, "a");

// ②処理の開始、終了のタイミングで、ログファイルに開始・終了の書き込みを行う。

// 開始のタイミング
$start_time = date("Y-m-d H:i:s");
fwrite($write_file, "start : ".$start_time."<br><br>");

//組み込み 関数の処理
copy("index1-1.php", "copied.txt");
// $a = fopen("https://github.com/Shinji-Kumagai/GEEKJOB_Challenge_PHP/tree/master/CampChallenge_PHP", "r");
$z = file_get_contents("https://github.com/Shinji-Kumagai/GEEKJOB_Challenge_PHP/tree/master/CampChallenge_PHP");
$b = fopen("copied.txt", "a");
fwrite("copied.txt", "aaa");
// fwrite($write_file, "start")

// 終了のタイミング
$end_time = date("Y-m-d H:i:s");
fwrite($write_file, "end : ".$end_time."<br><br><br>");

// ③書き込む内容は、「日時　状況（開始・終了）」の形式で書き込む。


// ④最後に、ログファイルを読み込み、その内容を表示してください。

// 書き込まれたログファイルの読み込みとその表示
// $read_file = fopen($logfile, "r");
$read = file_get_contents($logfile);
echo $read;
