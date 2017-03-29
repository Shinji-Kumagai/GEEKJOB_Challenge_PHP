<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stock List</title>
    <?php require 'functions.php'; ?>
</head>
<body>
    <?php session_start(); ?>
    <?php
    $_SESSION['msg'] = ' ';
    if(!isset($_SESSION['isReg'])) {
        $_SESSION['isReg'] = false;
    }
     ?>
    <!-- home -->
    <form action="home.php" method="post">
        <input type="submit" name="to_home" value="Home">
    </form>

    <!-- show register form -->
    <?php if($_SESSION['isReg'] === false) { ?>
    <form action="stock.php" method="post">
        <input type="submit" name="show_reg" value="Register">
    </form>
    <?php } ?>

    <!-- hide register form -->
    <?php if($_SESSION['isReg'] === true) {?>
    <form action="stock.php" method="post">
        <input type="submit" name="stop_reg" value="Stop register">
    </form>
    <?php } ?>

    <form action="stock.php" method="post">
        <input type="submit" name="truncate" value="Delete All information">
    </form>
    <?php
    if(isset($_POST['show_reg'])) {
        $_SESSION['isReg'] = true;
        header("Location: stock.php");
        exit;
    }
    if(isset($_POST['stop_reg'])) {
        $_SESSION['isReg'] = false;
        header("Location: stock.php");
        exit;
    }

    $dbh = create_pdo();

     if ($_SESSION['isReg'] === true) {
     ?>
     <form action="stock.php" method="post">
         <input type="text" name="product" placeholder='product name'>
         <input type="number" name="stock">
         <input type="text" name="store" placeholder="store">
         <input type="number" name="area">
         <input type="submit" name="insert" value="Insert">
     </form>
     <?php
    }



    // 在庫を表示する処理
    $dbh = create_pdo();
    // $columns にテーブルのカラム名を配列として格納
    $sql = "select * from inventory";
    $stmt = $dbh->query($sql);
    $columns = get_columns($stmt);

    $select_sql = "select * from inventory where userid = ".$_SESSION['userid'];
    // $select_sql = "select * from inventory where userid = $userid";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    $results = $dbh->query($select_sql);
    foreach ($columns as $column) {
        # code...
        echo "<th>$column</th>";
    }

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach($results as $result) {
        echo "<tr>";
        foreach($columns as $column) {
            echo "<td>$result[$column]</td>";
        }
        ?>
        <!-- 削除ボタン -->
        <td><form action="stock.php" method="post">
            <input style='display:none' type="number" name="sn"
            value="<?php echo $result['sn'];?>">
            <input type="submit" name="delete" value="delete">
        </form></td>
        <?php
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    // 商品情報登録
    if (isset($_POST['insert'])) {
        // inputされた情報をデータベースに入れる
        $userid = $_SESSION['userid'];
        $product = $_POST['product'];
        $stock = $_POST['stock'];
        $store = $_POST['store'];
        $area = $_POST['area'];

        $params = array();

        $sql = "insert into inventory (userid, product_name, stock, store, area) values (:userid, :product, :stock, :store, :area)";
        $dbh->prepare($sql);
        $params[':userid'] = $userid;
        $params[':product'] = $product;
        $params[':stock'] = $stock;
        $params[':store'] = $store;
        $params[':area'] = $area;

        pdo_insert($dbh, $sql, $params);
        header("Location: stock.php");
        exit;
    }

    // truncate の処理
    if (isset($_POST['truncate'])) {
        $sql = "truncate table inventory";
        $dbh->query($sql);
        unset($_POST['truncate']);
        header("Location: stock.php");
        exit;
    }

    if(isset($_POST['delete'])) {
        $sn = $_POST['sn'];
        $sql = "delete from inventory where sn = $sn";
        $dbh->query($sql);
        unset($_POST['delete']);
        header("Location: stock.php");
        exit;
    }
    ?>

</body>
</html>
