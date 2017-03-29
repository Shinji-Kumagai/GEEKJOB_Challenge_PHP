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
</head>
<?php
require 'defines.php';

function create_pdo() {
    $obj_pdo = new PDO(DSN, USER, PASS,
    array(
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ) //ARRAY
    );
    return $obj_pdo;
}


function select_pdo($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);

    foreach($params as $key=>$value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pdo_insert($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);

    foreach($params as $key=>$value){
        $stmt->bindValue($key,$value);
    }

    $stmt->execute();

    return $stmt->rowCount();
}

function get_columns($stmt) {
    // $stmt は $pdo->query("SELECT * FROM $table_name"); を格納した変数
    $columns = array();

    for($i=0;$i<$stmt->columnCount();$i++) {
        $meta = $stmt->getColumnMeta($i);
        $columns[] = $meta['name'];
    }

    return $columns;
}
