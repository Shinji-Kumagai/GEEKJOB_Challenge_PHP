<?php
$db = 'Challenge_db';
$dsn = 'mysql:host=localhost;dbname='.$db;
$user = 'kuma';
$pass = 'pass';

$dbh = new PDO($dsn, $user, $pass,
array(
    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
    )
);

// テーブルの選択
$table_name = $_POST['table_name'];

// テーブルから情報をゲット
$sql = "select * from $table_name";
$stmt = $dbh->query($sql);

// $columns に選択されたテーブルのカラムを格納
$columns = array();
for ($i=0; $i < $stmt->columnCount(); $i++) {
    $meta = $stmt->getColumnMeta($i);
    $columns[] = $meta['name'];
}

// $count に初期値を代入
$count = 0;

// sql 文を作る
$sql1 = "insert into $table_name (";
$sql2 = "";
$sql3 = ") values (";
// クオテーションマークを変数で作る
//  57行目で使用
$c = "'";
$sql4 = "";
$sql5 = ")";

// テーブルをforeachで表示
foreach ($stmt as $key => $value) {

    // 一回分だけやる
    while ($count < 1) {

        // カラム名をとり出す
        foreach($columns as $col) {

            // カウントをアップ
            $count += 1;


            if (strpos($col, "ID") === false) {

                // ２回目以降は , をつける
                // $_POST["$value[$col]"] はフォームに入っていた値
            if(empty($sql2) && empty($sql4)) {
                $sql2 .= "$col ";
                $sql4 .= $c.$_POST["$value[$col]"].$c;
            } else {
                $sql2 .= ", $col";
                $sql4 .= ",".$c.$_POST["$value[$col]"].$c;
            }

        }

        } // foreach

        // sql 文を合体
        $sql6 = $sql1.$sql2.$sql3.$sql4.$sql5;

        // sql 文を実行
        $dbh->query($sql6);
        var_dump($sql6);
    } //while
}// foreach
 ?>
 <form action="index7-9-3.php" method="post">
    <input type="submit" value="return">
 </form>
