<?php
$cookie_name = "user";
$cookie_value = "";
var_dump($_POST['f_name']);
if (!isset($cookie_value)) {
    $cookie_value = $_POST['f_name'];
}
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title>
    </head>
    <body>
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Hey! Nice to meet you!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        ?>

        <form action="index5-5-test.php" method="post">
            First Name: <br><input type="text" name="f_name" placeholder="Taro" autofocus><br>
            Last Name:<br> <input type="text" name="l_name" placeholder="PHP"><br>
            <br>
            <input type="radio" name="sex" value="man"> Male<br>
            <input type="radio" name="sex" value="woman"> Female<br>
             <br>
             <p></p>
            <textarea name="hobby" rows="8" cols="80" placeholder="My hobby is swimming..."></textarea>
            <input type="submit" name="submit">
        </form>
    </body>
</html>
