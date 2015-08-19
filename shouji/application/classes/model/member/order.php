<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Member_Order extends ORM {

    private  $suit_table_arr = array(
        '1'=>array('table'=>'sline_line_suit','field'=>'suitname'),
        '2'=>array('table'=>'sline_hotel_room','field'=>'roomname'),
        '3'=>array('table'=>'sline_car_suit','field'=>'suitname'),
        '5'=>array('table'=>'sline_spot_ticket','field'=>'title')
    );
  /*
   * 获取订单列表
   * @param $mid :会员id
   * @param $pagesize 数量
   * @param $pageno 页数
   *
   * */
    public function getOrderList($mid,$pagesize=5,$pageno=1,$haspinlun=0)
    {
        if($pageno<1) $pageno=1;
        $offset =($pageno-1)*$pagesize;
        $pinlun_where = $haspinlun ? " inner join sline_comment b on(a.id=b.orderid)" : "";
        $count_sql = "select count(a.id) as count from sline_member_order a {$pinlun_where} where a.memberid='{$mid}'";
        $count=DB::query(1,$count_sql)->execute()->get('count');
        if($count<$offset)
        {
            return null;
        }
        $sql = "select a.* from sline_member_order a {$pinlun_where} where a.memberid='{$mid}' order by a.addtime desc limit {$offset},{$pagesize}";
       // $arr = ORM::factory('member_order')->where("memberid={$mid}")->limit($pagesize)->get_all();
        //print_r($arr);
        $arr = DB::query(1,$sql)->execute()->as_array();
        foreach($arr as $key=>$v)
        {
            $expiredtime=3600;
            if(($v['status']==0 || $v['status']==1)
                    &&($v['addtime']+$expiredtime) <= time())
            {
                $sql = "update sline_member_order set status=3,ispay=3 where id='{$v['id']}'";
                if(DB::query(1,$sql)->execute()==1)
                {
                    //var_dump($v['id']);
                    $this->refundStorage($v['id'], 'plus');
                    $arr[$key]['status']=3;
                    $arr[$key]['ispay']=3;
                }
            }
            $arr[$key]['suitname'] = self::getSuitName($v['suitid'],$v['typeid'],$v['productautoid']);//套餐名
            $arr[$key]['totalprice'] =  $v['price'] * $v['dingnum']+$v['childnum']*$v['childprice']+$v['oldnum']*$v['oldprice'];
            $tmparr = ORM::factory('line')->where("aid='$v[productaid]'")->find()->as_array();
            $arr[$key]['mobilepic']=$tmparr['mobilepic'];
        }
        return $arr;
    }

    /*
     * 获取套餐名
     * */
    public function getSuitName($suitid,$typeid,$id)
    {
        $arr= array(1,2,3,5);
        if(empty($suitid))
        {
            return '';
        }
        else
        {
            if(in_array($typeid,$arr))
            {
                $table = $this->suit_table_arr[$typeid]['table'];
                $field = $this->suit_table_arr[$typeid]['field'];
                $sql = "select {$field} as title from {$table} where id='{$suitid}'";
                $row = DB::query(1,$sql)->execute()->as_array();
                return $row[0]['title'] ? $row[0]['title'] : '';
            }

        }
    }

   /*
    * 获取单个订单详细信息
    * */
   public function getOrderDetail($orderid)
   {
        $arr = $this->where("id={$orderid}")->find()->as_array();
        $arr['suitname'] = self::getSuitName($arr['suitid'],$arr['typeid'],$arr['productautoid']);//套餐名
        $arr['totalprice'] = $arr['price'] * $arr['dingnum']+$arr['childnum']*$arr['childprice']+$arr['oldnum']*$arr['oldprice'];
        $arr['pinlun'] = $this->getOrderPinlun($orderid);
        $arr['tourers'] = $this->getTourersInfo($orderid);
        if($arr['status'] == 0 || $arr['status'] == 1)
        {
            $cfg_pay_type=Common::getSysPara('cfg_pay_type');
            $pay_arr=explode(',',$cfg_pay_type);
            $expiredtime = 3600;
            $expired_date=Common::myDate('Y-m-d H:i:s',($arr['addtime']+$expiredtime));
        }
        $arr['pay_type'] = $pay_arr;
        $arr['expireddate']=$expired_date;
        return $arr;
   }
    /*
     * 获取订单评论信息
     * */
   public function getOrderPinlun($orderid)
   {
       $arr = ORM::factory('comment')->where("orderid='$orderid'")->find()->as_array();


       $score = $arr['score1']*20;
       $arr['satisfyscore'] = $score.'%';

       return $arr;


   }

    /*
 * 获取订单列表
 * @param $mid :会员id
 * @param $pagesize 数量
 * @param $pageno 页数
 *
 * */
    public function getOrderListByMobile($mobile,$pagesize=10,$pageno=1)
    {

        $offset =($pageno-1)*$pagesize;

        $sql = "select a.* from sline_member_order a where a.linktel='{$mobile}' order by a.addtime desc limit {$offset},{$pagesize}";

        $arr = DB::query(1,$sql)->execute()->as_array();
        foreach($arr as $key=>$v)
        {
            $orderAmount = Common::StatisticalOrderAmount($v);
            $arr[$key]['suitname'] = self::getSuitName($v['suitid'],$v['typeid'],$v['productautoid']);//套餐名
            $arr[$key]['totalprice'] = $orderAmount['totalPrice'];
            $arr[$key]['totalnumber'] = $orderAmount['numberDescript'];
            $arr[$key]['typename'] =Common::$channel[$v['typeid']].'订单';

        }
        return $arr;
    }
    
        /*
     * 获取订单游客信息
     * */
   public function getTourersInfo($orderid)
   {
       $arr = ORM::factory('member_order_tourer')->where("orderid='$orderid'")->get_all();
       return $arr;
   }
   
    /*
     * 返库存操作
     * */
    public function refundStorage($orderid,$op)
    {
        $row = ORM::factory('member_order')->where('id="'.$orderid.'"')->find()->as_array();
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
            if(empty($table))
                return;
            //加库存
            if($op=='plus')
            {
                if($typeid==1||$typeid==2||$typeid==3)
                    $sql = "update {$table} set number=number+$dingnum where day='$usedate' and suitid='$suitid'";
                elseif($typeid==13)
                    $sql = "update {$table} set totalnum=CAST(totalnum AS SIGNED)+$dingnum where id=$productid";
                else
                    $sql = "update {$table} set number=number+$dingnum where id=$productid";
            }
            else if($op=='minus')
            {
                if($typeid==1||$typeid==2||$typeid==3)
                    $sql = "update {$table} set number=number-$dingnum where day='$usedate' and suitid='$suitid'";
                elseif($typeid==13)
                    $sql = "update {$table} set totalnum=CAST(totalnum AS SIGNED)-$dingnum where id=$productid";
                else
                    $sql = "update {$table} set number=number-$dingnum where id=$productid";
            }
            DB::query(2,$sql)->execute();
        }
    }    

}