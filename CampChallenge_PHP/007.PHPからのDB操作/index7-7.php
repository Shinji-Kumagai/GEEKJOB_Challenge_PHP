<style media="screen">
    p.bottom {
        padding-bottom: 15px;
        border-bottom: 1px dotted grey;
    }
</style>
<?php
$db = 'Challenge_db';
$dsn = 'mysql:host=localhost;dbname='.$db;
$user = 'kuma';
$pass = 'pass';

try {
    $dbh = new PDO($dsn, $user, $pass,
    array(
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
        )
    );
    // レコード更新のSQL文
    $update = "update profiles set name = '松岡 修造', age = 48, birthday = '1967-11-06' where profilesID = 1 ";
    // SQL文の実行
    $dbh->query($update);
    $select = "select * from profiles";
    $catch = $dbh->query($select);
    foreach($catch as $a) {
        echo "<p>".$a['profilesID']."</p>";
        echo "<p>".$a['name']."</p>";
        echo "<p>".$a['tell']."</p>";
        echo "<p class='bottom'>".$a['age']."</p>";
        echo "<br><br>";
    }


}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
