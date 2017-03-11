<?php
$db = 'Challenge_db';
$dsn = 'mysql:host=localhost;dbname=Challenge_db';
$user = 'kuma';
$pass = 'pass';

try {
    $dbh = new PDO($dsn, $user, $pass,
    array(
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    )
);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
