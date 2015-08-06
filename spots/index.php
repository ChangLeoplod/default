<?php 
require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once SLINEINC."/view.class.php";
require_once SLINEDATA."/webinfo.php";
$typeid=5; //景点栏目
$html = dirname(__FILE__).'/index.html';
if(file_exists($html) && $genpage != 1)
{
    include($html);
    exit;
}
else
{
    $pv = new View($typeid);
    $pv->GetChannelKeywords($typeid);//根据栏目类型获取关键词.介绍,栏目名称
    $templet = Helper_Archive::getUseTemplet('spot_index');//获取首页使用模板
    $templet = !empty($templet) ? $templet : SLINETEMPLATE ."/".$cfg_df_style ."/" ."spots/" ."spot_index.htm";
    $pv->SetTemplet($templet);
    $pv->Display();
    exit();
}
?>
