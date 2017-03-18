<style media="screen">
    p.bottom {
        padding-bottom: 15px;
        border-bottom: 1px dotted grey;
    }
</style>
<form action="index7-8.php" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit">
</form>
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
    if(!empty($_POST['name'])) {
        $name = $_POST['name'];
        // 検索と表示のSQL文
        $search = "select * from profiles where name like '%$name%'";

        //検索 SQL文の実行
        $catch = $dbh->query($search);
        foreach($catch as $a) {
            echo "<p>".$a['profilesID']."</p>";
            echo "<p>".$a['name']."</p>";
            echo "<p>".$a['tell']."</p>";
            echo "<p class='bottom'>".$a['age']."</p>";
            echo "<br><br>";
        }
    }else {
        echo "中身はからです";
    }

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
