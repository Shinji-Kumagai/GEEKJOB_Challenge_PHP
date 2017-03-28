<!-- 課題：抽象クラスの load() と show() を使って、データベースの内容を表示する -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style media="screen">
    body {
        margin: 20px;
    }
</style>
<?php
require 'functions.php';

abstract class Base {
    abstract protected function load();
    abstract public function show();
}

class Human extends Base {
    private $table;
    function __construct($name) {
        $this->table = $name;
    }
    function load() {
        $dbh = new PDO(DSN, USER, PASS,
        array(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ) //ARRAY
        );
        $sql = "select * from $this->table";
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }
    function show() {
        // foreach($this->load() as $key => $value) {
        //     echo $value['name'].'<br>';
        // }
        $dbh = new PDO(DSN, USER, PASS,
        array(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ) //ARRAY
        );
        $sql = "select * from $this->table";
        $stmt = $dbh->query($sql);

        $columns = array();

        for($i=0;$i<$stmt->columnCount();$i++) {
            $meta = $stmt->getColumnMeta($i);
            $columns[] = $meta['name'];
        }

        foreach($stmt as $a) {
            foreach($columns as $c) {
                echo "$c is <mark>".$a[$c].'</mark><br>';
            }
            echo "<br>";
        }
    }
}


$test = new Human('people');
$test->show();

$test2 = new Human('stations');
$test2->show();
