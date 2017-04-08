<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    $name = $_POST['name'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $tell = $_POST['tell'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
    $userID = $_POST['id'];

    $birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);

     $result = update_profile($name, $birthday,$tell, $type, $comment, $userID);
    //  エラーが発生しなければ表示を行う
     if(!isset($result)){
     ?>
     <h1>更新確認</h1>
     <?php
     echo "Name : $name<br>";
     echo "Birthday : $birthday<br>";
     echo "Tell : $tell<br>";
     echo "Type : $type<br>";
     echo "Comment : $comment<br><br>";
      ?>
     以上の内容で更新しました。<br>
     <?php
     }else{
         echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
     }
     echo return_top();
?>
  </body>
</html>
