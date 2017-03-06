<?php
// NOTE: memo

// var_dump($_FILES);

echo "This file name is :".$_FILES['upload']['name']."<br>";
echo "This file size is :".$_FILES['upload']['size']."<br>";
echo "and the contents of this file is shown below.<br>";

// アップロードしたファイルを保存するときの名前の設定
$save_name = $_POST['save_name'];

move_uploaded_file($_FILES['upload']['tmp_name'
], "$save_name");


$file = fopen($save_name, "r");

// feof(FilePointer) は読み込みが最後の行に行ったらTrueを返す
// ファイルを最後の行まで読み込んで、１行出力するたびに改行する
while (!feof($file)) {
    print fgets($file)."<br>";
}

fclose($file);
