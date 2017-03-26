<?php
// PHPからのPDOを用いて実現してください。フォームからデータを挿入できる処理を構築してください。
$db = 'Challenge_db';
$dsn = 'mysql:host=localhost;dbname='.$db;
$user = 'kuma';
$pass = 'pass';

$message = ' ';
?>

<p><?php echo $message; ?></p>

<?php

$dbh = new PDO($dsn, $user, $pass,
array(
    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
    )
);
$tables = $dbh->query("show tables");
?>
<!-- テーブルネームを引っ張てきて select 文で option にして表示 -->
<form action="index7-9-3.php" method="post">
    <select name="table_name">
        <?php foreach ($tables as $key => $value) { ?>
                <option value="<?php echo "$value[0]"; ?>">
                 <!-- <?php echo "$value[0]"; ?> -->
                 <?php echo $value['Tables_in_challenge_db']; ?>
                </option>
        <?php } ?>
    </select>
    <input type="submit" value="submit">
</form>

<?php
// テーブルネームが選択されたら
// テーブルのカラム名をプレイスホルダーに入れて
// １レコード分だけ挿入できるフォームを表示
if (isset($_POST['table_name'])) {
?>
<!-- フォームの準備 -->
<form action="index7-9-3-insert.php" method="post">
    <?php

// 選択されたテーブルを変数に格納
    $table_name =  $_POST['table_name'];

    $sql = "select * from $table_name";
    $pdo_tables = $dbh->query($sql);

// $columns にカラム名を格納
    $columns = array();
    for ($i=0; $i < $pdo_tables->columnCount(); $i++) {
        $meta = $pdo_tables->getColumnMeta($i);
        $columns[] = $meta['name'];
    }

    // カウントを初期化
    $count = 0;

    foreach ($pdo_tables as $key => $value) {

        echo "<br><br>";

        // 一回だけおこなう
        while ($count < 1) {

            // 配列 $columns を $col として取り出す
            foreach ($columns as $col) {

            $count = $count + 1;

            // IDはオートインクレメントだから表示しない
            if (strpos($col, "ID") === false) {
            // 挿入するフォームを用意（テーブルのカラムの分だけ）
            echo "<input type='text' name='$value[$col]' placeholder='$col'>";
            }

            } //foreach

            ?>
            <!-- テーブルネームを送信するinputは表示はしない -->
        <input style="display:none" type="text" name="table_name"
        value="<?php echo $table_name; ?>">
            <input type="submit" name='insert_button' value="insert">
            <?php

        } //while

    } // foreach

?>
    </form>
<?php
} //if (isset($_POST['table_name'])) {
?>
