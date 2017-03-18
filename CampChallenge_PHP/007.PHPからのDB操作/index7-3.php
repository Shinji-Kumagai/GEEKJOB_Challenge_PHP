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

    $catch = $dbh->query('select * from user');
    echo "これまでのデータ<br><br>";
    foreach($catch as $a) {?>
        <p><?php echo 'ID : '.$a['userID'].''; ?></p>

        <p><?php echo '  Name : '.$a['name']; ?></p>
        <p><?php echo '  Tell : '.$a['tell'];  ?></p>
        <p><?php echo '  Age : '.$a['age'];  ?></p>
        <p><?php echo '  Birthday : '.$a['birthday'];  ?></p>
        <p><?php echo '  DepartmentID : '.$a['departmentID'];  ?></p>
        <p><?php echo '  StationID : '.$a['stationID'];  ?></p>
        <p><?php echo "<br><br><br><br>";  ?></p>
        <?php
} //foreach

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>

?>
