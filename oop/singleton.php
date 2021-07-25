<?php

class Singleton
{
    // シングルトンオブジェクトを格納する変数
    private static $singleton = null;

    // メッセージを格納する変数
    private $msg = null;

    // コンストラクタ
    private function __construct()
    {
        echo "インスタンスを生成しました\n";
    }

    // インスタンスを生成する
    public static function getInstance()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new static(); // Late Static Binding
        } else {
            echo "インスタンスは既に存在します\n";
        }
        return self::$singleton;
    }

    // cloneの禁止
    private function __clone() {}

    // メッセージを格納する
    public function setMsg($str)
    {
        $this->msg = $str;
    }

    // メッセージを取得する
    public function getMsg()
    {
        return $this->msg;
    }
}

echo "処理を開始しました\n";

// getInstance()でインスタンスを生成する
$obj1 = Singleton::getInstance();
$obj1->setMsg('$obj1 = Singleton::getInstance()');
echo "obj1 : " . $obj1->getMsg() . "\n";

// getInstance()でインスタンスを生成する
$obj2 = Singleton::getInstance();
$obj2->setMsg('$obj2 = Singleton::getInstance()');
echo "obj1 : " . $obj1->getMsg() . "\n";
echo "obj2 : " . $obj2->getMsg() . "\n";

var_dump($obj1);
var_dump($obj2);
