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
    ?>

<p>削除したい人物を選んでください</p>
<form action="index7-6.php" method="post">
<select name="name">
    <option value=" ">Nothing selected</option>
    <?php
     // NOTE: オプション
    $catch = $dbh->query('select * from user');
    foreach($catch as $a) {
        echo '<option value="', $a['userID'], '">', $a['userID'], '</option>';
    }
    ?>
</select>
<input type="submit" name="submit" onclick='return confirm("削除します。よろしいですか？");'>
</form> <?php
    if(!empty($_POST['name'])) {
        $name = $_POST['name'];
        var_dump($_POST['name']);

        $sql = "delete from user where userID = '".$_POST['name']."'";
        $dbh->query($sql);

        // $catch = $dbh->query("select * from user");
        $catch = $dbh->query("select * from user where userID = $name");
        foreach($catch as $a) { ?>
            <p><?php echo 'ID : '.$a['userID'].''; ?></p>
            <p><?php echo '  Name : '.$a['name']; ?></p>
            <p><?php echo '  Tell : '.$a['tell'];  ?></p>
            <p><?php echo '  Age : '.$a['age'];  ?></p>
            <p><?php echo '  Birthday : '.$a['birthday'];  ?></p>
            <?php
        }
    }

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
