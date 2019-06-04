<?php
/**
 * Created by PhpStorm.
 * User: tam
 * Date: 2019/6/1
 * Time: 0:26
 */
require_once(dirname(__FILE__) . '/skipif.inc');
$JS = <<< EOT
len = print('Hello' + ' ' + 'World!' + "\\n");
len;
EOT;
$v8 = new V8Js();
try {
    var_dump($v8->executeString($JS, 'basic.js'));
} catch (V8JsScriptException $e) {
    var_dump($e);
}


// Test is_a()
$a = new V8Js();
$a->test = function ($params) {
    return
        (is_a($params, 'V8Object')) ?
            $params->cb1("hel__lo") : false;
};
$ret = $a->executeString('PHP.test({ "cb1" : function (foo) { return foo + " wo__rld"; } });');
var_dump(__LINE__, $ret);

print("====================\r\n");

$a->testA = function ($p1, $p2) {
    return "saldfkjls;adf" . $p1 . $p2;
};
$ret = $a->executeString("PHP.testA(12345,'bbb');");
var_dump(__LINE__, $ret);

require_once __DIR__ . '/PubFuncPhp/TamPub1.hphp';
require_once __DIR__ . '/ScriptEngine/TaskSet.hphp';
$sTemp = "      谭江天1234567谭江天     \r\n";
print ($sTemp);
print(trim($sTemp));

//print($a === null? "true" : "false");
print ("======\r\n");
//\TamPub1\ConfigFileXml::checkKey("/home/tam/epage/test.xml", "a/c/b/c/d");
\TamPub1\ConfigFileXml::writeString("/home/tam/epage/test.xml", "f1/f2/f3", "sldjfslfsassadf加防腐剂");
\TamPub1\ConfigFileXml::writeIntAttr("/home/tam/epage/test.xml", "f1/f2/f3", "subKey2", 1234);
$a = "salj以中国的世界df;l世界sa";
print(mb_ereg_replace("世界", "百度", $a));


class A {
    public function getField(): string {
        return "sjsjjssj";
    }

    public function setField(string $value): void {
        print($value);
    }
}

class Item {
    private $kkk = "我是kkk";

    public function __get($name) {
        if (isset($this->$name)) {
            echo "pri_name:" . $this->$name . "\r\n";
            return $this->$name;
        } else {
            echo "不存在" . $name;
            return null;
        }
    }

    public function __set($name, $value) {
        // TODO: Implement __set() method.
        print($name . "=" . $value . "\r\n");
    }
}

print("\r\n=a)=====================\r\n");
class X {
    public static function get(): ?X {
        return null;
    }
}
X::get();



print("\r\n=b)=====================\r\n");
$d = time();
print(Date("Y-m-d H:i:s", $d));
?>