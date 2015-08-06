<?php
require_once(dirname(__FILE__)."/include/common.inc.php");
require_once(dirname(__FILE__)."/data/webinfo.php");
global $dsql;
$arr=$dsql->getAll("select * from #@__line_content");
   
print_r($arr);
?>