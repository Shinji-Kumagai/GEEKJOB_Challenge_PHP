<?php
function my_profile() {
    echo "私の名前は熊谷です。<br>";
    echo "誕生日は２月２５日です。<br>";
    echo "マンガのOne Pieceにハマってます。<br>";
}
// for ($i=0;$i<10;$i++) {
//     my_profile();

function my_number($num) {
    if ($num%2==0) {
        echo "偶数だべ";
    } else {
        echo "奇数だべ";
    }
}
// my_number(-2);
?>
