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


    $catch = $dbh->query('select * from profiles where name like "%茂"');
    foreach($catch as $a) {?>
        <p><?php echo 'ID : '.$a['profilesID'].''; ?></p>

        <p><?php echo '  Name : '.$a['name']; ?></p>
        <p><?php echo '  Tell : '.$a['tell'];  ?></p>
        <p><?php echo '  Age : '.$a['age'];  ?></p>
        <p><?php echo '  Birthday : '.$a['birthday'];  ?></p>
        <?php
} //foreach

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
