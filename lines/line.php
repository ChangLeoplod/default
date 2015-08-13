<?php
require_once(dirname(__FILE__)."/../include/common.inc.php");

require_once SLINEINC."/view.class.php";

$id = $d =$p =0;
$id = intval($_GET['id']);
$p= intval($_GET['p']);
$d= intval($_GET['d']);

$price = array (
    '1'=>'lineprice >=1000 and lineprice<3000',
    '2'=>'lineprice >=3000 and lineprice<5000',
    '3'=>'lineprice >=5000 and lineprice<10000',
    '3'=>'lineprice >=10000 and lineprice<20000',
);
$day = array(
    '1'=>'lineday=4',
    '2'=>'lineday=5',
    '3'=>'lineday=6',
    '4'=>'lineday=7',
    '5'=>'lineday=8',
);

global $dsql;

$sql="select a.* from #@__destinations a where a.pid = '0' and a.isopen=1 order by a.displayorder asc ";

$dest = $dsql->getall($sql);
foreach ($dest as $k=>$v) {
    $dest[$k]['p'] = $p;
    $dest[$k]['d'] = $d;
    if ($v['id'] == $id) {
        $dest[$k]['class'] = ' class="hover"';
    } else {
        $dest[$k]['class'] = '';
    }
}

$w=1;

if ($id) {
    $w .= " and FIND_IN_SET('{$id}',a.kindlist)";
}
if ($p) {
    $w .= " and ".$price[$p];
}
if ($d) {
    $w .= " and ".$day[$d];
}
$sql="select count(id) as amount from #@__line a where {$w} and FIND_IN_SET('162',a.attrid) and  a.ishidden=0";
$amount = $dsql->getOne($sql);
$total = $amount['amount'];

$sql="select * from #@__line a where {$w} and FIND_IN_SET('162',a.attrid) and  a.ishidden=0  order by a.displayorder asc,a.modtime desc,a.addtime desc limit 0,10";
$list = $dsql->getall($sql);

$pv = new View($typeid);

$pv->Fields['list'] = $list;
$pv->Fields['p'] = $p;
$pv->Fields['dest'] = $dest;
$pv->Fields['id'] = $id;
$pv->Fields['d'] = $d;
$pv->Fields['total'] = $total;
$pv->GetChannelKeywords($typeid);//根据栏目类型获取关键词.介绍,栏目名称


$templet =  SLINETEMPLATE ."/".$cfg_df_style ."/" ."lines/" ."line.htm";

$pv->SetTemplet($templet);

$pv->Display();

exit();


?>