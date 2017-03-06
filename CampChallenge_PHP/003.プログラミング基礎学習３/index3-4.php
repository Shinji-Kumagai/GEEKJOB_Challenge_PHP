<?php
function my_profile($type=false) {
    echo "私の名前は熊谷です。<br>";
    echo "誕生日は２月２５日です。<br>";
    echo "マンガのOne Pieceにハマってます。<br>";
    if ($type===true) {
        echo "この処理は正しく実行できました";
    }elseif ($type===false) {
        echo "正しく実行できませんでした";
    }
}

my_profile();
