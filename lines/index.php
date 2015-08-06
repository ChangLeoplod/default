<?php
require_once(dirname(__FILE__)."/../include/common.inc.php");
$typeid=1; //线路栏目
require_once SLINEINC."/view.class.php";

$html = dirname(__FILE__).'/index.html';
if(file_exists($html) && $genpage != 1 )
{
    include($html);
    exit;
}
else
{
    $id = $att_id =0;
    $id = intval($_GET['id']);
    $attr_id = intval($_GET['attr_id']);
    
    global $dsql;
    
    $sql="select a.* from #@__destinations a where a.pid = '0' and a.isopen=1 order by a.displayorder asc ";
    
    $dest = $dsql->getall($sql);
    foreach ($dest as $k=>$v) {
        $dest[$k]['attr_id'] = $attr_id;
        if ($v['id'] == $id) {
            $dest[$k]['class'] = ' class="hover"';
        } else {
            $dest[$k]['class'] = '';
        }
    }
    $sql="select a.* from #@__line_attr a where a.id<>'161' and a.id<>'162' and a.pid <> '0' and a.isopen=1 order by a.displayorder asc ";
    
    $attr = $dsql->getall($sql);
    foreach ($attr as $k=>$v) {
        $attr[$k]['attr_id'] = $v['id'];
        $attr[$k]['id'] = $id;
        if ($v['id'] == $attr_id) {
            $attr[$k]['class'] = ' class="hover"';
        } else {
            $attr[$k]['class'] = '';
        }
    }
    
    
    if ($attr_id) {
        $find = "FIND_IN_SET('{$attr_id}',a.attrid)";
    } else {
        $find = 'CONCAT(a.attrid,",") not like "%162,%" ';
    }
    if ($id) {
        $w .= " and FIND_IN_SET('{$id}',a.kindlist)";
    }
    $sql="select * from #@__line a where {$find} {$w} and  a.ishidden=0  order by a.displayorder asc,a.modtime desc,a.addtime desc";
    $list = $dsql->getall($sql);
    $pv = new View($typeid);
 
    $pv->Fields['list'] = $list;
    $pv->Fields['attr'] = $attr;
    $pv->Fields['dest'] = $dest;
    $pv->Fields['id'] = $id;
    $pv->Fields['attr_id'] = $attr_id;
    $pv->GetChannelKeywords($typeid);//根据栏目类型获取关键词.介绍,栏目名称

    $templet = Helper_Archive::getUseTemplet('line_index');//获取首页使用模板

    $templet = !empty($templet) ? $templet : SLINETEMPLATE ."/".$cfg_df_style ."/" ."lines/" ."line_index.htm";

    $pv->SetTemplet($templet);

    $pv->Display();

    exit();
}

?>