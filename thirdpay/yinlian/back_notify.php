﻿<?php

require  dirname(dirname(dirname(__FILE__))).'/include/common.inc.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/thirdpay/yinlian/func/common.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/thirdpay/yinlian/func/secureUtil.php';

if (isset ( $_POST ['signature'] )) {
    if(verify($_POST)) {

        $orderid = $_POST ['orderId']; //其他字段也可用类似方式获取
        $sql="select * from #@__member_order where ordersn='$orderid'";
        $arr=$dsql->GetOne($sql);
        if(substr($orderid,0,2)=='dz')
        {
            $updatesql="update sline_dzorder set status=2 where ordersn='{$orderid}'";
        }
        else
        {
            $updatesql="update sline_member_order set status=2 where ordersn='{$orderid}'"; //付款标志置为1,交易成功
            $msgInfo = Helper_Archive::getDefineMsgInfo($arr['typeid'],3);
            $memberInfo = Helper_Archive::getMemberInfo($arr['memberid']);
            $nickname = !empty($memberInfo['nickname']) ? $memberInfo['nickname'] : $memberInfo['mobile'];
            if(isset($msgInfo['isopen'])) //等待客服处理短信
            {
                $content = $msgInfo['msg'];
                $totalprice = $arr['price'] * $arr['dingnum'];
                $content = str_replace('{#MEMBERNAME#}',$nickname,$content);
                $content = str_replace('{#PRODUCTNAME#}',$arr['productname'],$content);
                $content = str_replace('{#PRICE#}',$arr['PRICE'],$content);
                $content = str_replace('{#NUMBER#}',$arr['dingnum'],$content);
                $content = str_replace('{#TOTALPRICE#}',$totalPrice,$content);
                Helper_Archive::sendMsg($memberInfo['mobile'],$nickname,$content);//发送短信.
            }

            $emailInfo=Helper_Archive::getEmailMsgConfig2($arr['typeid'],3);
            if(!empty($emailInfo) && $emailInfo['isopen']==1 && !empty($memberInfo['email']))
            {
                $title="订单支付成功";
                $content = $emailInfo['msg'];
                $totalprice = $arr['price'] * $arr['dingnum'];
                $content = str_replace('{#MEMBERNAME#}',$nickname,$content);
                $content = str_replace('{#PRODUCTNAME#}',$arr['productname'],$content);
                $content = str_replace('{#PRICE#}',$arr['price'],$content);
                $content = str_replace('{#NUMBER#}',$arr['dingnum'],$content);
                $content = str_replace('{#TOTALPRICE#}',$totalprice,$content);
                $content = str_replace('{#EMAIL#}',$memberInfo['email'],$content);
                ordermaill($memberInfo['email'],$title,$content);
            }
            //支付成功后添加预订送积分
            if(!empty($arr['jifenbook']))
            {
                $addjifen = intval($arr['jifenbook']);
                $sql = "update sline_member set jifen=jifen+{$addjifen} where mid='{$arr['memberid']}'";
                if($dsql->ExecuteNoneQuery($sql))
                {
                    Helper_Archive::addJifenLog($arr['memberid'],"预订线路{$arr['productname']}获取得{$addjifen}",$addjifen,2);
                }
            }
            //如果是酒店订单,则把子订单置为交易成功状态
            $sql="select typeid,id from sline_member_order where ordersn='$ordersn'";
            $ar = $dsql->GetOne($sql);
            if($ar['typeid']==2)
            {
                $s = "update sline_member_order set ispay=1 where pid='{$ar['id']}'";
                $dsql->ExecuteNoneQuery($s);
            }
        }
        $dsql->ExecuteNoneQuery($updatesql);



    }
   } else {
    echo '签名为空';
}

