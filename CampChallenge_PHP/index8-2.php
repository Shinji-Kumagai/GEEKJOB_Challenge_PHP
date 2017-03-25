<!-- ・パブリックな２つの変数
・２つの変数に値を設定するパブリックな関数
・２つの変数の中身をechoするパブリックな関数 -->
<?php
class Math {
    public $a = 10;
    public $b = 20;
    public function a($a, $b) {
        $this->a = $this->a + $a;
        $this->b = $this->b * $b;
    }
    public function b() {
        echo $this->a."<br>";
        echo $this->b."<br>";
    }
}
$test = new Math();
$test->b();
$test->a(3, 10);// 13, 200
$test->b();
echo $test->a.'<br>';
$test->a(7, 10);// 20, 2000
$test->b();
