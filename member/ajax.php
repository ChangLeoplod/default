<?php
require_once(dirname(__FILE__)."/config.php");

$nocontent_msg="<div style='height:100px;line-height:100px;text-align:center'><p>暂时没有相关信息!</p></div>";
//会员头像上传
if($dopost == 'uploadface')
{
	  if (!$_FILES['Filedata']) {
		die ( 'Image data not detected!' );
	  }
	  if ($_FILES['Filedata']['error'] > 0) {
	  switch ($_FILES ['Filedata'] ['error']) {
		  case 1 :
			  $error_log = 'The file is bigger than this PHP installation allows';
			  break;
		  case 2 :
			  $error_log = 'The file is bigger than this form allows';
			  break;
		  case 3 :
			  $error_log = 'Only part of the file was uploaded';
			  break;
		  case 4 :
			  $error_log = 'No file was uploaded';
			  break;
		  default :
			  break;
	  }
	  die ( 'upload error:' . $error_log );
	  } else {
	  $img_data = $_FILES['Filedata']['tmp_name'];
	  $size = getimagesize($img_data);
	  $file_type = $size['mime'];
	  if (!in_array($file_type, array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'))) {
		  $error_log = 'only allow jpg,png,gif';
		  die ( 'upload error:' . $error_log );
	  }
	  switch($file_type) {
		  case 'image/jpg' :
		  case 'image/jpeg' :
		  case 'image/pjpeg' :
			  $extension = 'jpg';
			  break;
		  case 'image/png' :
			  $extension = 'png';
			  break;
		  case 'image/gif' :
			  $extension = 'gif';
			  break;
	  }	
	  }
	  if (!is_file($img_data)) {
	  die ( 'Image upload error!' );
	  }
	  //图片保存路径,默认保存在该代码所在目录(可根据实际需求修改保存路径)
	  $save_path = SLINEROOT;
	  $file_dir = SLINEROOT.'/uploads/member/';
	  if(!is_dir($file_dir))mkdir($file_dir);
	  $uinqid = uniqid();
	  $litpic = '/uploads/member/'. $uinqid . '.' . $extension;
	  $filename = $save_path . '/' .$litpic ;
	  $result = move_uploaded_file( $img_data, $filename );
	  echo $litpic;
	  exit ();
	
}

//我的提问列表

if($dopost == 'getmyquestion')
{
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__question');
	//getAll($where=null,$order=null,$limit=null,$field=null)
	$offset=($curpage-1)*$pagesize;
	$arr = $_model->getAll("memberid='$uid'","addtime desc","$offset,$pagesize");
	foreach($arr as $row)
	{
		$pubdate = Mydate('Y-m-d',$row['addtime']);//提问时间
		$replydate = Mydate('Y-m-d',$row['replytime']);//回复时间
		$productname = getProductName($row['productid'],$row['typeid']);//产品名称
		
		$out.='<li>
                	<dl>
                  	<dt><s></s><span>'.$pubdate.'<label>咨询产品</label></span>'.$productname.'</dt>
                    <dd class="dd_1">咨询：'.$row['content'].'</dd>
                    <dd class="dd_2">回复：'.strip_tags($row['replycontent']).'</dd>
                    <dd class="dd_3">'.$replydate.' 回复</dd>
                  </dl>
                </li>';
		
	}
	
	$out = !empty($out) ? $out : $nocontent_msg;
	$totalnum = $_model->getCount("memberid='$uid'");
	$totalpage=ceil($totalnum/$pagesize);;
	$pageinfo = setPageInfo($curpage,$totalpage);
	$data = array('list'=>$out,'pageinfo'=>$pageinfo);
	echo json_encode($data);
	exit();
	
	
}
//最近一月订单(先读最新订单)
if($dopost == 'monthorder')
{
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__member_order');
	$head='<table width="1000" border="0" cellspacing="0" cellpadding="0">
            	  <tr>
            	    <th width="125" height="30" align="left" scope="col">订单编号</th>
            	    <th width="475" align="left" scope="col">订单商品</th>
            	    <th width="70" scope="col">订单金额</th>
            	    <th width="165" scope="col">下单时间</th>
            	    <th width="80" scope="col">订单状态</th>
            	    <th width="85" scope="col">操作</th>
          	    </tr>';
	//getAll($where=null,$order=null,$limit=null,$field=null)
	$offset=($curpage-1)*$pagesize;
	$arr = $_model->getAll("memberid='$uid' and pid=0","addtime desc","$offset,$pagesize");
	foreach($arr as $row)
	{

        if($row['typeid']!=2)
        {
            $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'] + $row['oldnum'] * $row['oldprice'];
        }
        else
        {
            if($row['haschild']==1)
            {
                $childOrder = getChildOrderInfo($row['id']);
                $totalprice = 0;
                foreach($childOrder as $order)
                {
                    $p = intval($order['dingnum'])*$order['price'];
                    $totalprice+= $p;
                }
            }

        }
		$productname = getProductName($row['productautoid'],$row['typeid'],$row['productname']);//预订产品名称

		$dingdate = Mydate('Y-m-d H:i:s',$row['addtime']);
		$status = getOrderStatus($row['status'],$row['paytype']);
		$orderurl = "index.php?dopost=vieworder&typeid={$row['typeid']}&orderid={$row['id']}";
		$out.=' <tr>
            	    <td height="50">'.$row['ordersn'].'</td>
            	    <td>'.$productname.'</td>
            	    <td align="center">&yen;'.$totalprice.'</td>
            	    <td align="center">'.$dingdate.'</td>
            	    <td align="center">'.$status.'</td>
            	    <td align="center"><a class="ck_cz" href="'.$orderurl.'">查看</a></td>
          	    </tr>';
		
	}
	
	$foot=' </table>';
    $out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
	$totalnum = $_model->getCount("memberid='$uid' and pid=0");
	$totalpage=ceil($totalnum/$pagesize);;
	$pageinfo = setPageInfo($curpage,$totalpage);
	$data = array('list'=>$out,'pageinfo'=>$pageinfo);
	echo json_encode($data);
	exit();        	       	 
	
}
//全部订单
if($dopost == 'allorder')
{
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__member_order');
	
	//getAll($where=null,$order=null,$limit=null,$field=null)
	if($typeid) $w = " and typeid='{$typeid}'";//添加订单类型判断
	$offset=($curpage-1)*$pagesize;
	$arr = $_model->getAll("memberid='$uid' and pid=0 {$w}","ispay asc,addtime desc","$offset,$pagesize");
	foreach($arr as $row)
	{
        if($row['typeid']!=2)
        {
            $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'] + $row['oldnum'] * $row['oldprice'];
        }
        else
        {
            if($row['haschild']==1)
            {
                $childOrder = getChildOrderInfo($row['id']);
                $totalprice = 0;
                foreach($childOrder as $order)
                {
                    $p = intval($order['dingnum'])*$order['price'];
                    $totalprice+= $p;
                }
            }

        }
		$productname = getProductName($row['productautoid'],$row['typeid'],$row['productname']);//预订产品名称

		$dingdate = Mydate('Y-m-d H:i:s',$row['addtime']);
		$status = getOrderStatus($row['status'],$row['paytype']);
		$orderurl = "index.php?dopost=vieworder&typeid={$row['typeid']}&orderid={$row['id']}";
                $_model2 = new CommonModule('#@__line');
                $lineinfo = $_model2->getOne("aid='{$row['productaid']}'");
		$out .='<div class="order_li">
                    <div class="od_tit">订单流水号:'.$row['ordersn'].'<span>（下单时间：'.$dingdate.'）</span></div>
                    <a href="/lines/show_'.$row['productaid'].'.html" target="_blank" class="pic"><img src="'.$lineinfo['packpic'].'" /></a>
                    <div class="name">
                            <a href="#" target="_blank">'.$productname.'</a>	
                    </div>
                    <div class="price">&yen;'.$totalprice.'</div>
                    <dl class="type">
                            <dt>'.$status.'</dt>
                            <dd><a href="'.$orderurl.'">查看详情</a></dd>	
                    </dl>';
                if ($row['ispay'] ==1 ) {
                    $out .='<a class="pay_over" href="#">已完成</a>';
                } elseif($row['status']==1) {
                    $out .='<a href="'.$orderurl.'" class="pay_now">马上支付</a>';
                } else if($row['status']==3) {
                    $out .='<a href="#" class="pay_out">已取消</a>';
                }
            $out .='<div class="clear"></div></div>';
	}
	
    $out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
	$totalnum = $_model->getCount("memberid='$uid' and pid=0 ".$w);
	$totalpage=ceil($totalnum/$pagesize);;
	$pageinfo = setPageInfo($curpage,$totalpage);
	$data = array('list'=>$out,'pageinfo'=>$pageinfo);
	echo json_encode($data);
	exit();     
	
}
//未点评订单
if($dopost == 'unpinlun')
{
	
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__member_order');
	$head ='<table width="1000" border="0" cellspacing="0" cellpadding="0">
            	  <tr>
            	    <th width="125" height="30" align="left" scope="col">订单编号</th>
            	    <th width="475" align="left" scope="col">订单商品</th>
            	    <th width="70" scope="col">订单金额</th>
            	    <th width="165" scope="col">下单时间</th>
            	    <th width="165" scope="col">操作</th>
           	    </tr>';
    $foot = '</table>';
	$offset=($curpage-1)*$pagesize;
	if($typeid) $w = "and typeid='{$typeid}'";//添加订单类型判断
	$arr = $_model->getAll("memberid='$uid'  and pid=0 and status=2 and ispinlun=0 {$w}","addtime desc","$offset,$pagesize");
	foreach($arr as $row)
	{
        if($row['typeid']!=2)
        {
            $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'] + $row['oldnum'] * $row['oldprice'];
        }
        else
        {
            if($row['haschild']==1)
            {
                $childOrder = getChildOrderInfo($row['id']);
                $totalprice = 0;
                foreach($childOrder as $order)
                {
                    $p = intval($order['dingnum'])*$order['price'];
                    $totalprice+= $p;
                }
            }

        }
		$productname = getProductName($row['productautoid'],$row['typeid'],$row['productname']);//预订产品名称
		//$totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'];
		$dingdate = Mydate('Y-m-d H:i:s',$row['addtime']);
		$orderurl = "index.php?dopost=vieworder&typeid={$row['typeid']}&orderid={$row['id']}";
		$out.=' <tr>
            	    <td height="50">'.$row['ordersn'].'</td>
            	    <td>'.$productname.'</td>
            	    <td align="center">&yen;'.$totalprice.'</td>
            	    <td align="center">'.$dingdate.'</td>
            	    <td align="center" style=" position:relative"><a class="color_wdp btn_pinlun" href="javascript:;">立即点评</a>'.getPinLunHtml($row['typeid'],$row['id'],$row['productautoid']).'</td>
          	    </tr>';
		
	}
	$out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
	$totalnum = $_model->getCount("memberid='$uid' and status=2 and ispinlun=0");
	$totalpage=ceil($totalnum/$pagesize);;
	$pageinfo = setPageInfo($curpage,$totalpage);
	$data = array('list'=>$out,'pageinfo'=>$pageinfo);
	echo json_encode($data);
	exit();   
	
}

//未付款订单
if($dopost == 'unpay')
{
	
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__member_order');
	
	$offset=($curpage-1)*$pagesize;
	if($typeid) $w = "and typeid='{$typeid}'";//添加订单类型判断
	$arr = $_model->getAll("memberid='$uid'  and pid=0 and ispay=0 and status=1 {$w}","addtime desc","$offset,$pagesize");
	foreach($arr as $row)
	{
        if($row['typeid']!=2)
        {
            $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'] + $row['oldnum'] * $row['oldprice'];
        }
        else
        {
            if($row['haschild']==1)
            {
                $childOrder = getChildOrderInfo($row['id']);
                $totalprice = 0;
                foreach($childOrder as $order)
                {
                    $p = intval($order['dingnum'])*$order['price'];
                    $totalprice+= $p;
                }
            }

        }
		$productname = getProductName($row['productautoid'],$row['typeid'],$row['productname']);//预订产品名称
		//$totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'];
		$dingdate = Mydate('Y-m-d H:i:s',$row['addtime']);
		$orderurl = "index.php?dopost=vieworder&typeid={$row['typeid']}&orderid={$row['id']}";

                $_model2 = new CommonModule('#@__line');
                $lineinfo = $_model2->getOne("aid='{$row['productaid']}'");
		$out .='<div class="order_li">
                    <div class="od_tit">订单流水号:'.$row['ordersn'].'<span>（下单时间：'.$dingdate.'）</span></div>
                    <a href="/lines/show_'.$row['productaid'].'.html" target="_blank" class="pic"><img src="'.$lineinfo['packpic'].'" /></a>
                    <div class="name">
                            <a href="/lines/show_'.$row['productaid'].'.html" target="_blank">'.$productname.'</a>	
                    </div>
                    <div class="price">&yen;'.$totalprice.'</div>
                    <dl class="type">
                            <dt>'.$status.'</dt>
                            <dd><a href="'.$orderurl.'">查看详情</a></dd>	
                    </dl>
                    <a class="pay_now" href="'.$orderurl.'">马上支付</a>
                    <div class="clear"></div>	
            </div>';
		
	}
	$out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
	$totalnum = $_model->getCount("memberid='$uid' and status=1  and pid=0");
	$totalpage=ceil($totalnum/$pagesize);;
	$pageinfo = setPageInfo($curpage,$totalpage);
	$data = array('list'=>$out,'pageinfo'=>$pageinfo);
	echo json_encode($data);
	exit();   
	
	
}
//完成订单
if($dopost == 'wancheng')
{
    Helper_Archive::loadModule('common');
    $_model = new CommonModule('#@__member_order');
    $offset=($curpage-1)*$pagesize;
    if($typeid) $w = "and typeid='{$typeid}'";//添加订单类型判断
    $arr = $_model->getAll("memberid='$uid'  and pid=0 and status=2 {$w}","addtime desc","$offset,$pagesize");
    foreach($arr as $row)
    {
        if($row['typeid']!=2)
        {
            $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'] + $row['oldnum'] * $row['oldprice'];
        }
        else
        {
            if($row['haschild']==1)
            {
                $childOrder = getChildOrderInfo($row['id']);
                $totalprice = 0;
                foreach($childOrder as $order)
                {
                    $p = intval($order['dingnum'])*$order['price'];
                    $totalprice+= $p;
                }
            }

        }
        $productname = getProductName($row['productautoid'],$row['typeid'],$row['productname']);//预订产品名称
       // $totalprice = $row['dingnum'] * $row['price'] + $row['childnum'] * $row['childprice'];
        $dingdate = Mydate('Y-m-d H:i:s',$row['addtime']);
        $orderurl = "index.php?dopost=vieworder&typeid={$row['typeid']}&orderid={$row['id']}";
        $_model2 = new CommonModule('#@__line');
                $lineinfo = $_model2->getOne("aid='{$row['productaid']}'");
		$out .='<div class="order_li">
                    <div class="od_tit">订单流水号:'.$row['ordersn'].'<span>（下单时间：'.$dingdate.'）</span></div>
                    <a href="/lines/show_'.$row['productaid'].'.html" target="_blank" class="pic"><img src="'.$lineinfo['packpic'].'" /></a>
                    <div class="name">
                            <a href="#" target="_blank">'.$productname.'</a>	
                    </div>
                    <div class="price">&yen;'.$totalprice.'</div>
                    <dl class="type">
                            <dt>交易成功</dt>
                            <dd><a href="'.$orderurl.'">查看详情</a></dd>	
                    </dl>
                    <a class="pay_over" href="#">已完成</a>
                    <div class="clear"></div>	
            </div>';

    }
    $out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
    $totalnum = $_model->getCount("memberid='$uid' and status=2 and ispinlun=0 and pid=0");
    $totalpage=ceil($totalnum/$pagesize);;
    $pageinfo = setPageInfo($curpage,$totalpage);
    $data = array('list'=>$out,'pageinfo'=>$pageinfo);
    echo json_encode($data);
    exit();


}

//保存评论信息

if($dopost == 'savepinlun')
{
	$arr=array();
	Helper_Archive::loadModule('common');
	$_model = new CommonModule('#@__comment');
	$scores = array($score1,$score2,$score3,$score4);
	$arr['memberid'] = $uid;
	$arr['content'] = Helper_Archive::pregReplace($msg,1);
	$arr['orderid'] = $orderid;
	$arr['score1'] = $score1;
	$arr['score2'] = $score2;
	$arr['score3'] = $score3;
	$arr['score4'] = $score4;
	$arr['articleid'] = $productid;
	$arr['level'] = getPinLunLevel($scores);
	$arr['typeid'] = $typeid;
	$arr['addtime'] = time();
    //$arr['kindlist'] = Helper_Archive::getProductKindList($arr['articleid'],$arr['typeid']);
	$status = 0;
	if($_model->add($arr))
	{

		
	    $order = new CommonModule('#@__member_order');
		$ar = array('ispinlun'=>1);
		$w = array('id'=>$orderid);
		$order->update($ar,$w);

        //点评积分
        $jifencomment = $order->getField('jifencomment',"id=$orderid");


        if(!empty($jifencomment))
        {

            $sql = "update sline_member set jifen=jifen+{$jifencomment} where mid='$uid'";
            $dsql->ExecuteNoneQuery($sql);
        }

		$status = 1;
	}
	echo json_encode(array('status'=>$status));
	exit();	
	
}

if($dopost=='delorder')
{
    refundStorage($orderid,'plus');
	$sql="delete from #@__member_order where memberid='$uid' and id='$orderid' and status!=2";
	$result=$dsql->ExecuteNoneQuery($sql);
	if($result)
	  echo 'ok';
	else
	  echo 'no';  
}
//积分操作记录
if($dopost == 'jifenlog')
{

        Helper_Archive::loadModule('common');
        $_model = new CommonModule('#@__member_jifen_log');
        $head ='<table width="1000" border="0" cellspacing="0" cellpadding="0">
            	  <tr>
            	    <th width="125" height="30" align="left" scope="col">时间</th>
            	    <th width="475" align="left" scope="col">操作</th>

           	    </tr>';
        $foot = '</table>';
        $offset=($curpage-1)*$pagesize;

        $arr = $_model->getAll("memberid='$uid'","addtime desc","$offset,$pagesize");
        foreach($arr as $row)
        {


            $addtime = Mydate('Y-m-d H:i:s',$row['addtime']);

            $out.=' <tr>
            	    <td height="50">'.$addtime.'</td>
            	    <td>'.$row['content'].'</td>

          	    </tr>';

        }
        $out = !empty($out) ? $head.$out.$foot : $nocontent_msg;
        $totalnum = $_model->getCount("memberid='$uid'");
        $totalpage=ceil($totalnum/$pagesize);;
        $pageinfo = setPageInfo($curpage,$totalpage);
        $data = array('list'=>$out,'pageinfo'=>$pageinfo);
        echo json_encode($data);
        exit();



}

/*
   * 返库存操作
   * */
function refundStorage($orderid,$op)
{
    global $dsql;
    Helper_Archive::loadModule('common');
    $_model = new CommonModule('#@__member_order');
    $row =$_model->getOne("id='$orderid'");
    if(isset($row))
    {
        $dingnum = intval($row['dingnum'])+intval($row['childnum']);
        $suitid = $row['suitid'];
        $productid = $row['productautoid'];
        $typeid = $row['typeid'];
        $usedate = strtotime($row['usedate']);


        $storage_table=array(
            '1'=>'sline_line_suit_price',
            '2'=>'sline_hotel_room_price',
            '3'=>'sline_car_suit_price',
            '5'=>'sline_spot_ticket',
            '8'=>'sline_visa',
            '13'=>'sline_tuan'
        );
        $table = $storage_table[$typeid];
        //加库存
        if($op=='plus')
        {
            if($typeid==1||$typeid==2||$typeid==3)
                $sql = "update {$table} set number=number+$dingnum where day='$usedate' and suitid='$suitid'";
            else
                $sql = "update {$table} set number=number+$dingnum where id=$productid";
        }
        else if($op=='minus')
        {
            if($typeid==1||$typeid==2||$typeid==3)
                $sql = "update {$table} set number=number-$dingnum where day='$usedate' and suitid='$suitid'";
            else
                $sql = "update {$table} set number=number-$dingnum where id=$productid";
        }
        $dsql->ExecNoneQuery($sql);
    }
}



//分页信息

function setPageInfo($currentpage,$totalpage)
{

	
	//上一页
	if($currentpage > 1)
	{
		$out.=' <a class="prev" title="上一页" href="javascript:$.AjaxSearch.changePage(\'pre\');">上一页</a>&nbsp;';
	}
	
    //第一页
	if($totalpage > 1)
	{
		if($currentpage == 1 )
		{
		   $out.='<span>1</span>&nbsp;';	
		}
		else
		{
		   	 $out.='<a title="1" href="javascript:$.AjaxSearch.page(1);" >1</a>&nbsp;';	
		}
		
	}
	$out.= $totalpage >=1 ? '' : '';
	
	//是否显示省略号
    $out.= $currentpage-2 > 2 ? '<em>...</em>&nbsp;' : '';
	
	//中间数字部分

      
		$list_len = 2;
        $total_list = $list_len * 2 + 1;
        if($currentpage >= $total_list)
        {
            $j = $currentpage-$list_len;
            $total_list = $currentpage+$list_len;
            if($total_list>$totalpage)
            {
                $total_list=$totalpage-1;
            }
        }
        else
        {
            $j=2;
            if($total_list>$totalpage)
            {
                $total_list=$totalpage-1;
            }
        }
        for($j;$j<=$total_list;$j++)
        {
            if($j==$currentpage)
            {
                $out.= '<span>'.$currentpage.'</span>&nbsp;';
            }
            else
            {
               $out.='<a title="'.$j.'" href="javascript:$.AjaxSearch.page('.$j.');">'.$j.'</a>&nbsp;';
            }
        }
	//结尾省略号
    if($totalpage-$currentpage > 2)
	{
	     $out.='<span class="point">...</span>&nbsp;';	
	}
	//最后一页
	if($totalpage > 1)
	{
		if($currentpage == $totalpage)
		{
			$out.='<span>'.$totalpage.'</span>&nbsp;';
			
		}
		else
		{
		  $out.='<a title="'.$totalpage.'" href="javascript:$.AjaxSearch.page('.$totalpage.');">末页</a>&nbsp;';
		}
	}
	//下一页
	if($currentpage < $totalpage)
	{
		$out.='<a class="next" title="下一页" href="javascript:$.AjaxSearch.changePage(\'next\');">下一页</a>';
	}
	
   
   return $out;

}

//获取子级订单价格
function getChildOrderInfo($orderid)
{
    global $dsql;
    $sql = "select * from sline_member_order where pid='$orderid'";
    $arr = $dsql->getAll($sql);
    return $arr;
}


$do = $_GET['do'];
if ($do=='insert') {
    $count = $dsql->GetOne('select count(id) as amount from  #@__member_set where mid="'.$uid.'"');
    if ($count['amount']>=10) {
        $arr['result'] = 1;
    } else {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $idno = $_POST['idno'];
        $ppno = $_POST['ppno'];
        $time = time();
        $sql="insert into #@__member_set(`mid`,`name`,`mobile`,`email`,`idno`,`ppno`,`intime`) values('$uid','$name','$mobile','$email','$idno','$ppno','$time')";
	if ($dsql->ExecuteNoneQuery($sql)) {
            $arr['result'] =2;
        }
        
    }
    echo json_encode($arr);
}

if ($do=='edit') {
    $id = intval($_POST['id']);
    if ($id) {
     
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $idno = $_POST['idno'];
        $ppno = $_POST['ppno'];
        $sql="update #@__member_set  set `name`='$name',`mobile`='$mobile',`email`='$email', `idno`='$idno', `ppno`='$ppno' where id='$id'";
	if ($dsql->ExecuteNoneQuery($sql)) {
            $arr['result'] =2;
        }
    }
    echo json_encode($arr);
}

