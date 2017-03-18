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
<form action="index7-10.php" method="post">
<select name="id">
    <option value="nothing">Nothing selected</option>
    <?php
     // NOTE: オプション
    $catch = $dbh->query('select * from profiles');
    foreach($catch as $a) {
        echo '<option value="', $a['profilesID'], '">', $a['profilesID'], '</option>';
    }
    ?>
</select>
<input type="submit" name="submit" onclick='return confirm("削除します。よろしいですか？");'>
</form>
<?php
if(isset($_POST['id']) and !empty($_POST['id'])) {
    $catch = $dbh->query("select * from profiles where profilesID = '".$_POST['id']."'");

    $sql = "delete from profiles where profilesID = '".$_POST['id']."'";
    $dbh->query($sql);
    if(!$_POST['id'] = "nothing") {
        echo "以下の情報が削除されました";
    }

    foreach($catch as $a) {
        echo "<p>ID:". $a['profilesID']."</p>";
        echo "<p>name:".  $a['name']."</p>";
        echo "<p>tell:".  $a['tell']."</p>";
        echo "<p>age:".  $a['age']."</p>";
        echo "<p>birthday:".  $a['birthday']."</p>";
    }
}else {
        echo 'Select something!';
    }

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
