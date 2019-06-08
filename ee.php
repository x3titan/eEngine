<?php
require_once __DIR__ . "/PageLoad.hphp";
$pageLoad = new \eEngine\PageLoad();
$pageLoad->Page_Load();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn" xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="utf-8"/>
    <title><?php print($pageLoad->jsStringTitle); ?></title>
    <?php print($pageLoad->jsStringHead); ?>
    <style type="text/css"></style>
    <!-- <script src="Scripts/tampub3.js" type="text/javascript"></script> -->
    <script src="Scripts/eengine.js?v=0.422" type="text/javascript"></script>
    <?php print($pageLoad->jsStringInclude); ?>
    <script type="text/javascript" language="javascript">
        var layout;
        //ePage版权所有
        <?php print($pageLoad->jsStringOnPageCreate); ?>
        function onLoad() {
            try {
                eb.init();
                $g("divSearchText").style.overflow = "hidden";
            <?php print($pageLoad->jsStringOnPageLoad); ?>
            <?php print($pageLoad->jsStringInitControl); ?>
            <?php print($pageLoad->jsStringOnControlLoad); ?>
                setTimeout(timeFragment, 100);
            } catch (e) {
                alert(e.message);
                //alert(e.description) 
                //alert(e.number) 
                //alert(e.name) 
            }
        }
        var lastCW = 0, lastCH = 0;
        ee.autoResize = true;
        function timeFragment() {
            if (!ee.autoResize) {
                setTimeout(timeFragment, 100);
                return;
            }
            var cw = $g("divRoot").offsetWidth;
            var ch = $g("divRoot").offsetHeight;
            if ((lastCW == cw) && (lastCH == ch)) {
                setTimeout(timeFragment, 100);
                return;
            }
            lastCW = cw;
            lastCH = ch;

            eb.processDock();

            setTimeout(timeFragment, 100);
        }
    </script>
</head>
<body onload="onLoad()" style="margin: 0px; padding: 0px; background-color: #a0a0a0;
    width: 100%; height: 100%">
<div id="divSearchText" style="position: absolute; width: 1px; height: 1px; overflow: hidden">
    <?php print($pageLoad->jsStringSearchText); ?>
</div>
<div id="divRoot" style="position: absolute; width: 100%; height: 100%;">
</div>
</body>
</html>




