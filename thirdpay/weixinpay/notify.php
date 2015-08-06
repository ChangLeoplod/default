<?php

require  dirname(dirname(dirname(__FILE__))).'/include/common.inc.php';



require_once "lib/WxPay.Api.php";
require_once 'lib/WxPay.Notify.php';



class PayNotifyCallBack extends WxPayNotify
{
    //查询订单
    public function Queryorder($transaction_id)
    {
        $input = new WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);
        $result = WxPayApi::orderQuery($input);

        if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS")
        {
            return true;
        }
        return false;
    }

    //重写回调处理函数
    public function NotifyProcess($data, &$msg)
    {


         global $dsql;
        $notfiyOutput = array();

        if(!array_key_exists("transaction_id", $data)){
            $msg = "输入参数不正确";
            return false;
        }
        //查询订单，判断订单真实性
        if(!$this->Queryorder($data["transaction_id"])){
            $msg = "订单查询失败";
            return false;
        }

        $ordersn=$data['out_trade_no'];

        if(empty($ordersn))
            return false;

        $sql="select * from #@__member_order where ordersn='$ordersn'";
        $arr=$dsql->GetOne($sql);
        if(empty($arr))
            return false;
        if($arr['status']==2)
            return true;


        //logResult('spotid:'.$arr['spotid']);
        //	if(!$arr)exit();

        if(substr($ordersn,0,2)=='dz')
        {
            $ordertype = 'dz';
            $updatesql="update sline_dzorder set status=2 where ordersn='$ordersn'";
        }
        else
        {
            $ordertype = 'sys';
            $updatesql="update #@__member_order set ispay=1,status=2 where ordersn='$ordersn'"; //付款标志置为1,交易成功


        }
        $dsql->ExecuteNoneQuery($updatesql);
        //logResult('更新成功');

        //$subject='你成功预订'.$arr['productname'].'产品';
        //$text="尊敬的{$arr['linkman']},你已经成功在{$GLOBALS['cfg_webname']}预订{$arr['productname']},数量{$arr['dingnum']}.";
        //sendMsg($subject,$text,$arr['handletel'],$ordersn);

        if($ordertype !='dz')
        {
            $msgInfo = Helper_Archive::getDefineMsgInfo($arr['typeid'],3);
            $memberInfo = Helper_Archive::getMemberInfo($arr['memberid']);
            $nickname = !empty($memberInfo['nickname']) ? $memberInfo['nickname'] : $memberInfo['mobile'];
            if(isset($msgInfo['isopen'])) //等待客服处理短信
            {
                $content = $msgInfo['msg'];
                $totalprice = $arr['price'] * $arr['dingnum'];
                $content = str_replace('{#MEMBERNAME#}',$memberInfo['nickname'],$content);
                $content = str_replace('{#PRODUCTNAME#}',$arr['productname'],$content);
                $content = str_replace('{#PRICE#}',$arr['PRICE'],$content);
                $content = str_replace('{#NUMBER#}',$arr['dingnum'],$content);
                $content = str_replace('{#TOTALPRICE#}',$totalprice,$content);
                Helper_Archive::sendMsg($memberInfo['mobile'],$nickname,$content);//发送短信.
            }

            $emailInfo=Helper_Archive::getEmailMsgConfig2($arr['typeid'],3);
            if(!empty($emailInfo)&& $emailInfo['isopen']==1 && !empty($memberInfo['email']))
            {
                $title="订单支付成功";
                $content = $emailInfo['msg'];
                $totalPrice = $arr['price'] * $arr['dingnum'];
                $content = str_replace('{#MEMBERNAME#}',$memberInfo['nickname'],$content);
                $content = str_replace('{#PRODUCTNAME#}',$arr['productname'],$content);
                $content = str_replace('{#PRICE#}',$arr['price'],$content);
                $content = str_replace('{#NUMBER#}',$arr['dingnum'],$content);
                $content = str_replace('{#TOTALPRICE#}',$totalPrice,$content);
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

        return true;
    }
}

$notify = new PayNotifyCallBack();
$notify->Handle(false);



