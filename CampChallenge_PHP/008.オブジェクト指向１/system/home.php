<!-- 在庫管理システムを作成します。
まず、DBにユーザー情報管理テーブルと、商品情報登録テーブルを作成してください。
その上で、下記機能を実現してください。
①ユーザーのログイン・ログアウト機能
②商品情報登録機能
③商品一覧機能 -->

<!-- ログインさせる
    メールが登録してあるか確認
        パスワードがあってるか確認 -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <?php
        require 'functions.php';
        session_start();
        ?>
    </head>
    <body>
        <p><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg']; } ?></p>
        <?php
        $s = "'";

        if(isset($_SESSION['mail'])) {
            // 誰がサインインしているのか表示
            echo "You are logged in as <mark>".$_SESSION['mail'].'</mark>';
        }

        if (!isset($_SESSION['isLogin'])) {
            // 初めて訪れたときはセッションを初期化
            $_SESSION['isLogin'] = 0;
        }

        ?>

        <!-- まだログインしてなかったら表示 -->
        <?php if($_SESSION['isLogin'] === 0) {?>

        <!-- login -->
        <form action="home.php" method="post">
            <input type="email" name="mail" placeholder="email address" required>
            <input type="password" name="pwd" placeholder="password" required>
            <input type="submit" name="login" value="Login">
        </form>

        <!-- sign up -->
        <form action="sign_up.php" method="post">
            <input type="submit" name="to_sign_up" value="Sign up">
        </form>

        <?php } // if($_SESSION['isLogin'] === false) ?>


        <!-- ログイン完成したら表示 -->
        <?php if ($_SESSION['isLogin'] === 1) { ?>

        <!-- register -->
        <form action="reg.php" method="post">
            <input type="submit" name="to_reg" value="Register">
        </form>

        <!-- stock list  -->
        <form action="stock.php" method="post">
            <input type="submit" name="to_stock" value="Stock List">
        </form>

        <!-- logout -->
        <form action="logout.php" method="post">
            <input type="submit" name="log_out" value="log out">
        </form>

        <?php } // if ($_SESSION['isLogin'] === True) ?>


    </body>
</html>
<?php
if (isset($_POST['login'])) {
    // ログインボタンが押されたら
    // 変数にユーザーからの情報を格納
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    $dbh = create_pdo();
    // $get_pwd = $dbh->query("select pwd from user where email = $s$mail$s");
    $get_pwd = $dbh->query("select * from user where email = $s$mail$s");

    if ($get_pwd->rowCount() == 0) {
        // まだアカウント登録されてない場合
        $_SESSION['msg'] = "You haven't completed sign up!";
        header("Location: home.php");
        exit ;
    } else {
        // アカウント登録されてたら
        foreach ($get_pwd as $a) {

            if ($a['pwd'] === $pwd) {
                // dbのpwdとinputされたpwdが一致していたら
                $_SESSION['msg'] = 'Logged in successfully';
                $_SESSION['isLogin'] = 1;
                $_SESSION['userid'] = $a['userid'];
                $_SESSION['mail'] = $a['email'];

                header("Location: home.php");
                exit ;
            } else {
                // パスワードが間違ってたら
                $_SESSION['msg'] = "Password is wrong";

                header("Location: home.php");
                exit ;
            } // else
        }
    } //else
} //if (isset($_POST['login']))

 ?>
