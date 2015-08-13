<?php
require_once(dirname(__FILE__)."/../include/common.inc.php");

require_once SLINEINC."/view.class.php";

$id = $d =$p =0;
$page = intval($_POST['page']);
$id = intval($_POST['id']);
$p= intval($_POST['p']);
$d= intval($_POST['d']);

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
$b = 10;
if ($page<1) {
    $page =1;
}
$a = ($page-1)*$b;
if ($a<0) {
    $a=0;
}
if ($page<ceil($total/$b)) {
    $nextpage = $page+1;
}
$sql="select * from #@__line a where {$w} and FIND_IN_SET('162',a.attrid) and  a.ishidden=0  order by a.displayorder asc,a.modtime desc,a.addtime desc limit {$a},{$b}";
$list = $dsql->getall($sql);

foreach ($list as $k=>$v) {
    $html .='
            <div class="sale_area">
                <div class="pic">
                        <a target="_blank" href="/lines/show_'.$v['aid'].'.html"><img src="'.$v['bigpic'].'"></a>
                        <span><a target="_blank" href="/lines/show_'.$v['aid'].'.html">'.$v['linename'].'</a></span>
                </div>

                <div class="sa_txt">
                       '.$v['features'].'	
                </div>

                <dl class="sa_buy">
                        <dt><span>￥'.$v['lineprice'].'	元</span><em>/人</em></dt>	

                        <dd><a class="buy" target="_blank" href="/lines/show_'.$v['aid'].'.html">立即购买 </a></dd>
                </dl>

                <div class="clear"></div>
        </div>
            ';
}
$arr = array(
    'html'=>$html,
    'page'=>$nextpage,
    'status'=>1,
);

echo json_encode($arr);

?>