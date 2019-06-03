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
\TamPub1\ConfigFileXml::writeIntSubKey("/home/tam/epage/test.xml", "f1/f2/f3", "subKey2", 1234);
$a = "saljdf;lsa";
print((int)$a);
/*
$xml = simplexml_load_file("/home/tam/epage/test.xml");
print($xml->getName() . "\r\n");
$item = $xml->xpath("/root/field2");

print ("\r\n");

//foreach($xml->children() as $period) {
//    $study[] = get_object_vars($period);//获取对象全部属性，返回数组
//}
//$item = $xml->addChild("period", "谭江天");
//$item->addAttribute("attr1", "value1");
//$item->addAttribute("attr2", "value2");
$xml->asXml("/home/tam/epage/test.xml");
*/


?>