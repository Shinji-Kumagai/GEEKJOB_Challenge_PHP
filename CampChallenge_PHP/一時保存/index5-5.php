<?php
// session_start();
//
// if(isset($_SESSION["count"])) {
//     $_SESSION["count"]++;
//
//     $f_name = $_POST['f_name'];
//     setcookie("f_name", $f_name);
//     // var_dump($f_name);
//     $f_name1 = $_COOKIE['f_name'];
//     echo $f_name1;
// } else {
//     $_SESSION["count"] = 1;
// }

// $l_name = $_POST['l_name'];
// $sex = $_POST['sex'];
// var_dump($_POST['sex']);
// $hobby = $_POST['hobby'];

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

// NOTE:
// session_start();
// $_SESSION['f_name'] = $_POST['f_name'];
// $_SESSION['l_name'] = $_POST['l_name'];
// $_SESSION['sex'] = $sex;
// $_SESSION['hobby'] = $hobby = $_POST['hobby'];;
// echo "Hello, <br>".$_SESSION['f_name']." ". $_SESSION['l_name']."<br>";
// echo $_SESSION['hobby']."<br>";
// echo $_SESSION["count"]."回目のアクセスです。";
// NOTE:
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

        <form action="index5-5.php" method="post">
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
