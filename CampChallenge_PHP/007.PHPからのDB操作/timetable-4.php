<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Timetable</title>
</head>
<style media="screen">
    label {
        margin-right: 10px;
        width: 125px;
        float: left;
    }
    li {
        list-style: none;
        margin-top: 10px;
    }
    table {
        text-align: center;
        font-size:1.2em;
    }
    th {
        border: 1px solid grey;
        font-size: 36px;
    }
    td{
        border: 1px solid grey;
        width:90px;
        height:90px;
    }
    .left {
        float: left;
    }
    .right {
        float:right;
    }
    input[type='submit']{
        width: 100px;
        display: block;
        margin: 0 auto;
    }
</style>
<body>
    <div class="left">

    <?php
    $dsn = 'mysql:host=localhost;dbname=timetable;';
    $user = 'kuma';
    $pass = 'pass';
    $dbh = new PDO($dsn, $user, $pass,
            array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false));
    // $issubmit = false;
    // $iserror = false;
    echo "<table>";
    echo "<tr><th colspan=8>My Timetable</th></tr>";

    echo "<tr>";
    $week = array(' ', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
    foreach($week as $a) {
        echo "<td>$a</td>";
    }
    echo "</tr>";

    for($row=1;$row<8;$row++) {
        echo "<tr>";
            for ($col=0; $col < 8; $col++) {
                if ($col==0) {
                    echo "<td>$row</td>";
                } else {
                    echo "<td>";
                    // NOTE: PDO
                    // $sql = "select * from information where day = $col and period = $row";
                    $sql = "select * from information where day_period = $col$row";
                    $result = $dbh->query($sql);
                    foreach ($result as $a) {
                        echo $a['subject'].'<br>';
                        echo $a['name'];
                    }
                    echo "</td>";
                }
            }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div><!--left side -->

    <div class="right">
        <form action="timetable-4.php" method="post">
            <ul>

            <li><label for="day">Day :</label>
            <select name="day">
                <option value=1>Sun</option>
                <option value=2>Mon</option>
                <option value=3>Tue</option>
                <option value=4>Wed</option>
                <option value=5>Thu</option>
                <option value=6>Fri</option>
                <option value=7>Sat</option>
            </select></li>

            <li><label for="period">Period :</label>
            <input type="number" name="period" min=1 max=7 value=1></li>

            <li><label for="subject">Subject :</label>
            <input type="text" name="subject"></li>

            <li><label for="name">Name :</label>
            <input type="text" name="name"></li>

            <li><input type="submit" name="submit" value="update"></li>
        </ul>
        </form>
    </div><!-- right side-->
    <?php
    if(isset($_POST['submit'])){

        $day = $_POST['day'];
        $period = $_POST['period'];
        $subject = $_POST['subject'];
        $name = $_POST['name'];
        $update_sql = "insert into information (day_period, subject, name) values ($day$period, '$subject', '$name') on duplicate key update day_period = $day$period, subject = '$subject', name = '$name' ";
        var_dump($update_sql);
        echo "<br>";
        $dbh->query($update_sql);
    }
     ?>
</body>
</html>
