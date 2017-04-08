<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            // どれにも値が入ってなかったら
            $result = serch_all_profiles();
        }else{

            if(!empty($_GET['type'])) {
                echo "yo-";
            $result = serch_profiles($_GET['name'],$_GET['year'],$_GET['type']);
            } else {
                echo 'hello';
                $result = serch_profiles($_GET['name'],$_GET['year']);
            }
        }


        foreach($result as $value){
        ?>
            <tr>
                <!-- idはurlに文字を追加する
                つまりa href = "URL?(id)"になる -->
                <td><a href="<?php echo RESULT_DETAIL ?>?
                    id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php echo return_top(); ?>
</body>
</html>
