<?php
require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once(dirname(__FILE__)."/../include/view.class.php");
$pv = new View();
$pv->SetTemplet(SLINETEMPLATE ."/".$cfg_df_style ."/" . "/about/joinus.htm");
$pv->Display();
