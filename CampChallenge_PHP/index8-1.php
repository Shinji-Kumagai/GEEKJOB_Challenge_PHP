<?php
// 抽象化
// ファストフードの店員とそのお客さん
class Cashier {
    public $greet = 'いらっしゃいませ'; //1
    public function ask() {
        return '店内ご利用ですか？'; //2
    }
    public $ocnfirm = 'ドリンクはいかがなさいますか？'; //5
    public $price = '５００円です'; //7
    public $thank = 'ありがとございました。'; //10
}

class Customer {
    public $yes = 'はい'; //3
    public $no = 'いいえ'; //3
    public $req = 'このセットでお願いします。'; //4
    public function cola() {
        return 'コーラでお願いします。'; //6
    }
    public $eat = 'いただきます'; //8
    public $finish = 'ごちそうさまでした'; //9
}
