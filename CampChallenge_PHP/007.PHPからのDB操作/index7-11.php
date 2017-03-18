<!-- <input type="text" placeholder="Kumagai Shinji"> -->
<style media="screen">
    ul li {
        list-style: none;
        margin-top: 10px;
    }
    /*ul li.*/
    label {
        margin-right: 10px;
        width: 100px;
        float: left;
    }
    ul {
        width: 500px;
        margin: 0 auto;
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
</style>
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
    <!-- SELECT フォーム -->
    <p>ここから更新したいProfilesIDを選んでください。</p>
    <form action="index7-11.php" method="post">
        <select name="id">
            <?php // profilesID をセレクト文で表示
            // form の profilesID を取得する select の name は id
            $sql = "select profilesID from profiles";
            $profiles = $dbh->query($sql);
            foreach($profiles as $a) {
                echo "<option value=$a[0]>$a[0]</option>";
            }
            echo "<input type='submit' name='select' value='select'>";
            ?>
        </select>
    </form> <!-- form -->

    <!-- 更新フォーム -->
    <form action="index7-11.php" method="post">
        <ul>

            <?php
            // 選択がされたなら
            // if(isset($_POST['id']) and !empty($_POST['id'])) {
            // 選択がされてないなら
            if(!isset($_POST['id'])) {
                // process
            }
            else //選択がされたなら
            {

                $id = $_POST['id'];
                // 選択された ID のレコードを表示
                // name='name', age='age', tell='tell', birthday='birthday'
                $select_sql = "select * from profiles where profilesID = $id";
                // var_dump($id); // OK
                $select = $dbh->query($select_sql);
                // $row = $select->rowCount();
                // var_dump($row);
                foreach($select as $s) {
                    // var_dump($s['name']);//OK
                    // echo $s['name'];
echo '更新する値に置き換えてください';
                    // NOTE: みよじしか表示されない
echo "<li><label for='id'>ProfilesID :</label><input type=text name='profilesID' value=".$s['profilesID']."></li>";
echo "<li><label for='name'>Name :</label><input type=text name='name' value=".$s['name']."></li>";
echo "<li><label for='age'>Age :</label><input type=text name='age' value=".$s['age']."></li>";
echo "<li><label for='tell'>Tell :</label><input type=text name='tell' value=".$s['tell']."></li>";
echo "<li><label for='birthday'>Birthday :</label><input type=text name='birthday' value=".$s['birthday']."></li>";
echo '<li><input type="submit" id="btn" name="submit" value="update"></li>';

                }
            }
            ?>
        </ul>
    </form>
            <?php
        // } // if(isset($_POST['id']) and !empty($_POST['id']))

        //もし、まだ何も送られてなかったら//
        if(!isset($_POST['name'])) {
            echo "<p>hello</p>";
        }
         else // 更新される値が設定されてるなら
        {
            // var_dump($_POST['id']);
            $update_sql = 'update profiles set name = "'.$_POST['name'] .'", age = '.$_POST['age'].', tell = "'.$_POST['tell'].'", birthday = "'.$_POST['birthday'].'" where profilesID = '.$_POST['profilesID'];
            // var_dump($update_sql);
            $dbh->query($update_sql);
            echo "<p>Information updated.</p>";
        }// else

}// try
catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
