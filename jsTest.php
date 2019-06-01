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

$a->testA = function () {
    return "saldfkjls;adf";
};
$ret = $a->executeString("PHP.testA();");
var_dump(__LINE__, $ret);


?>