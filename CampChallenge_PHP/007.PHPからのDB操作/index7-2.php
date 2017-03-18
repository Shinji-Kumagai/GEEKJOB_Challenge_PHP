<style media="screen">
    input, select, option {
        width: 150px;
        height: 20px;
        display: block;
        margin-bottom: 10px;
    }
    input[type="submit"] {
        background-color: skyblue;
        /*color:toma;*/
    }
</style>
<form action="index7-2.php" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="tell" placeholder="tell">
    <input type="text" name="age" placeholder="age">
    <!-- <input type="text" name="birthday" placeholder="birthday"> -->
    <input type="date" name="bday" max="2017-03-12">
    <select name='department'>
        <option value=0>なし</option>
        <option value=1>開発部</option>
        <option value=2>営業部</option>
        <option value=3>総務部</option>
    </select>
    <select name="station">
        <option value=0>なし</option>
        <option value=1>九段下</option>
        <option value=2>永田町</option>
        <option value=3>渋谷</option>
        <option value=4>神保町</option>
        <option value=5>上井草</option>
    </select>
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
    // INSERTする値がなかった時の初期値を設定
    $name = ' ';
    $tell = ' ';
    $age = 0;
    $birthday = ' ';
    $department = 1;
    $station = 1;
    //
    if(((isset($_POST['name'])) and (isset($_POST['tell'])) and
    (isset($_POST['age'])) and (isset($_POST['birthday'])) and
    (isset($_POST['department'])) and (isset($_POST['station'])) and
    ((empty($_POST['name'])) and (empty($_POST['tell'])) and (empty($_POST['age'])) and (empty($_POST['birthday'])) and (empty($_POST['department'])) and (empty($_POST['station'])))
)){
    echo 'Input something!<br>';
}

    // 何も入ってなかったらINSERTしない
    // if((empty($_POST['name'])) and (empty($_POST['tell'])) and (empty($_POST['age'])) and (empty($_POST['birthday'])) and (empty($_POST['department'])) and (empty($_POST['station']))) {
    //     echo 'Input something!<br>';
    // }
    // POSTに値が入っていたら、その値を格納
    else {
        if(!empty($_POST['name'])) {
            $name = $_POST['name'];
        }
        if(!empty($_POST['tell'])) {
            $tell = $_POST['tell'];
        }
        if(!empty($_POST['age'])) {
            $age = $_POST['age'];
        }
        if(!empty($_POST['birthday'])) {
            $birthday = $_POST['birthday'];
        }
        if(!empty($_POST['department'])) {
            $department = $_POST['department'];
        }
        if(!empty($_POST['station'])) {
            $station = $_POST['station'];
        }
    $sql = "insert into user (name, tell, age, birthday, departmentID, stationID) values ('".$name."','".$tell."',".$age.",'".$birthday."',".$department.",".$station.")";
    echo "<br><br>";
    $dbh->query($sql);
    $catch = $dbh->query('select * from user');
    echo "これまでのデータ<br><br>";
    foreach($catch as $a) {
        var_dump($a['userID']);
        var_dump($a['name']);
        var_dump($a['age']);

        echo '<p>ID : '.$a['userID'].'</p>';
        echo '<p>Name : '.$a['name'].'</p>';
        echo '<p>Tell : '.$a['tell'].'</p>';
        echo '<p>Age : '.$a['age'].'</p>';
        echo '<p>Birthday : '.$a['birthday'].'</p>';
        echo '<p>DepartmentID : '.$a['departmentID'].'</p>';
        echo '<p>StationID : '.$a['stationID'].'</p>';
        echo "<br><br><br><br>";
    // }// if
} // foreach
}// else

}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>
