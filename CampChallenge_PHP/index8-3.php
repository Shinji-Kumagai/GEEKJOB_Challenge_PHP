<!-- ・２つの変数の中身をクリアするパブリックな関数 -->
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

class No_math extends Math {
    public function clear() {
        $this->a = Null;
        $this->b = Null;
        return [$this->a, $this->b];
 }
}
$test = new No_math();
echo $test->a.'<br>'; //10
$test->clear();
$n  =$test->b;
var_dump($n); // NULL
