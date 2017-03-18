<!--
NOTE
name='name', min_age='min_age', max_age='max_age',
min_date='min_date', max_date='max_date'
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
<style media="screen">
    ul li {
            list-style: none;
            margin-top: 10px;
        }
        /*ul li.*/
    label {
        margin-right: 10px;
        width: 125px;
        float: left;
    }
    ul {
        width: 500px;
        margin: 0 auto;
    }
    input {
    width:200px;
    }
    input#btn {
    display: block;
    }
    p {
    width: 500px;
    margin: 0 auto;
    margin-bottom: 20px;
    }
    select, [type='submit'] {
    width: 100px;
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
    }
    .i {

    /*background-color: skyblue;*/
    /*opacity: 0.7;*/
    }
    .last {
        border-bottom: 1px dotted grey;
    }
    .top {
        /*margin-top: 10px;*/
        border-top: 1px dotted grey;
}
</style>
    </head>
    <body>

<form action="index7-12.php" method="post">
    <ul>
        <li>サーチするテーブルは「user」です。</li>
        <li><label for="name">Name :</label>
            <input type="text" name="name"></li>
        <li><label for="age">Age (from):</label>
            <input type="number" name="min_age" min=0 value=0></li>
        <li><label for="age">Age (to):</label>
            <input type="number" name="max_age" min=0 max=150 value=50></li>
        <li><label for="date">Birthday (from):</label>
            <input type="date" name="min_date" value=1960-01-01></li>
        <li><label for="date">Birthday (to):</label>
            <input type="date" name="max_date" max=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?>></li>
        <li><label for="submit">Search! </label>
            <input type="submit" name="search" value='Search!'></li>
    </ul>
</form>
<?php

$db = 'Challenge_db';
$dsn = 'mysql:host=localhost;dbname='.$db;
$user = 'kuma';
$pass = 'pass';

$table = 'user';
if(isset($_POST['search'])) {
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    } else {
        $name = '%';
    }
    if(!empty($_POST['min_age'])){
        $min_age = $_POST['min_age'];
    } else {
        $min_age = 0;
    }
    if(!empty($_POST['max_age'])){
        $max_age = $_POST['max_age'];
    } else {
        $max_age = 150;
    }
    if(!empty($_POST['min_date'])){
        $min_date = $_POST['min_date'];
    } else {
        $min_date = '1950-01-01';
    }
    if(!empty($_POST['max_date'])){
        $max_date = $_POST['max_date'];
    } else {
        $max_date = date('Y-m-d');
    }
    try {
        $dbh = new PDO($dsn, $user, $pass,
        array(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ) //ARRAY
    );// PDO
    $search_sql = "select * from user where name like '%$name%' and (age >= $min_age and age <= $max_age) and (birthday between '$min_date' and '$max_date')";
    $select = $dbh->query($search_sql);
    foreach($select as $a) {
echo "<ul>";
echo '<li class="i top"><label>userID :</label>'.$a['userID'].'</li><br>';
echo '<li class="i"><label>name :</label>'.$a['name'].'</li><br>';
echo '<li class="i"><label>tell :</label>'.$a['tell'].'</li><br>';
echo '<li class="i"><label>age :</label>'.$a['age'].'</li><br>';
echo '<li class="i"><label>birthday :</label>'.$a['birthday'].'</li><br>';
echo '<li class="i"><label>departmentID :</label>'.$a['departmentID'].'</li><br>';
echo '<li class="i last"><label>stationID :</label>'.$a['stationID'].'</li>';
echo "</ul>";
    }// foreach
    echo 'hi';
}//TRY
catch (Exception $e) {
    echo $e->message();
}
}
else{
    // process
    echo "Search now!";
    try {
        $dbh = new PDO($dsn, $user, $pass,
        array(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ) //ARRAY
    );// PDO

    $result = $dbh->query("select * from user");
    foreach($result as $a) {
        echo "<ul>";
        echo '<li class="i top"><label>userID :</label>'.$a['userID'].'</li><br>';
        echo '<li class="i"><label>name :</label>'.$a['name'].'</li><br>';
        echo '<li class="i"><label>tell :</label>'.$a['tell'].'</li><br>';
        echo '<li class="i"><label>age :</label>'.$a['age'].'</li><br>';
        echo '<li class="i"><label>birthday :</label>'.$a['birthday'].'</li><br>';
        echo '<li class="i"><label>departmentID :</label>'.$a['departmentID'].'</li><br>';
        echo '<li class="i last"><label>stationID :</label>'.$a['stationID'].'</li>';
        echo "</ul>";
    }
}catch (Exception $e) {
    echo $e->message();
}
}//else
 ?>
</body>
</html>
