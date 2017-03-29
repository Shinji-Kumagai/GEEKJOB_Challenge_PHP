<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SIGN UP</title>
    <?php require 'functions.php'; ?>
    <?php session_start(); ?>
</head>
<body>
    <?php
    $_SESSION['msg'] = ' ';
    $s = "'";
    if (isset($_POST['sign_up'])) {
    // サインアップが押されたら
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];

    $dbh = create_pdo();
    $sql = "select * from user where email = $s$mail$s";
    $row = $dbh->query($sql);

        if ($row->rowCount() > 0) {
            // すでにアカウントを持っていたらログインさせる
            $_SESSION['msg'] = "You already have your account";
            $_SESSION['msg'] .= "<br>Please log in";
        } else {
            // まだアカウントを持っていなかったら
            if ($pwd !== $pwd2) {
                // 確認用のパスワードが違ってたら
                $_SESSION['msg'] = "Passwoeds didn't match";
            } else {
            // 確認用のパスワードが合ってたら
                $insert_sql = "insert into user (email, pwd) values ($s$mail$s, $s$pwd$s)";
                $dbh->query($insert_sql);
                echo "returnning to home";
                // 下のやつはなぜか実行されなかった
                // $_SESSION['msg'] = "returnning to home";
                header("Refresh: 2; url=home.php");
                $_SESSION['msg'] = "Please log in";
                $_SESSION['pwd'] = Null;
                exit ;
            }

        }


    }
     ?>
     <p><?php echo $_SESSION['msg']; ?></p>

     <!-- sign up -->
    <form action="sign_up.php" method="post">
        <input type="email" name="mail" placeholder="email address"
        value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; }?>" required>
        <input type="password" name="pwd" placeholder="password" required>
        <input type="password" name="pwd2" placeholder="confirm password" required>
        <input type="submit" name="sign_up" value="sign up">
    </form>

    <form action="home.php" method="post">
        <input type="submit" name="submit" value="Home">
    </form>
</body>
</html>
