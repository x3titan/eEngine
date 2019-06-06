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

//require_once __DIR__ . '/PubFuncPhp/TamPub1.hphp';
//require_once __DIR__ . '/ScriptEngine/TaskSet.hphp';
require_once __DIR__ . '/PageLoad.hphp';


print("\r\n=c)====let's the fun begin=================\r\n");
$sim = new \eEngine\PageLoad();
$sim->Page_Load();




?>