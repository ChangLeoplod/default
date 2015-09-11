<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Page extends Stourweb_Controller{

    public function before()
    {
        parent::before();

    }
    //404页面
	public function action_404()
    {
         header('HTTP/1.1 404 Not Found');
         header("status: 404 Not Found");
         $this->display('public/404');
	}
    /*
     * 付款选择页面
     * */
    public function action_pay()
    {
        self::checkMid();
        $orderid = $this->params['orderid'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $jsApiParameters=1;
         if (strpos('s'.$user_agent, 'MicroMessenger'))
        {
            $GLOBALS['cfg_wxpay_appid'] = Common::getSysConf('value','cfg_wxpay_appid',0); //appid
            $GLOBALS['cfg_wxpay_mchid'] = Common::getSysConf('value','cfg_wxpay_mchid',0); //mchid
            $GLOBALS['cfg_wxpay_key'] = Common::getSysConf('value','cfg_wxpay_key',0); //key
            $GLOBALS['cfg_wxpay_appsecret'] = Common::getSysConf('value','cfg_wxpay_appsecret',0); //secret

            include_once(PUBLICPATH.'/thirdpay/weixinpay/WxPayPubHelper/WxPayPubHelper.php');
             
             //使用jsapi接口
            $jsApi = new JsApi_pub();
            //=========步骤1：网页授权获取用户openid============
            //通过code获得openid
            $code = $_GET['code'];
            if (!$code)
            {

                //触发微信返回code码
                $backurl = 'http://'.$_SERVER["SERVER_NAME"].'/page/pay/orderid/'.$orderid;
                $url = $jsApi->createOauthUrlForCode($backurl);

                Header("Location: $url"); 
                            exit;
            }else
            {
                //获取code码，以获取openid
                $jsApi->setCode($code);
                $openid = $jsApi->getOpenId();
            }
             $unifiedOrder = new UnifiedOrder_pub();

             
            //设置统一支付接口参数
            //设置必填参数
            //appid已填,商户无需重复填写
            //mch_id已填,商户无需重复填写
            //noncestr已填,商户无需重复填写
            //spbill_create_ip已填,商户无需重复填写
            //sign已填,商户无需重复填写

            
            $info = ORM::factory('member_order')->where("id='".$orderid."'")->find()->as_array();
            $goodsname = $info['productname'];
            $out_trade_no = $info['ordersn'];
            if ($info['roombalance']>0&&$info['dingnum']%2==1) {
                $roombalance = $info['roombalance'];
            }
            $total_fee = (intval($info['price']) * intval($info['dingnum']))+(intval($info['childprice'])*intval($info['childnum']))+$roombalance;
            $total_fee = $total_fee*100;
            
            $unifiedOrder->setParameter("openid","$openid");//商品描述
            //自定义订单号，此处仅作举例
            $timeStamp = time();
            $tem_trade = WxPayConf_pub::APPID."$timeStamp";
            $unifiedOrder->setParameter("out_trade_no","$tem_trade");//商户订单号 
            $unifiedOrder->setParameter("body","$goodsname");//商品描述
            $unifiedOrder->setParameter("total_fee","$total_fee");//总金额
            $unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址 
            $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
            //非必填参数，商户可根据实际情况选填
            $unifiedOrder->setParameter("attach","$out_trade_no");//订单号  
            //$unifiedOrder->setParameter("device_info","XXXX");//设备号 
            //$unifiedOrder->setParameter("attach","XXXX");//附加数据 
            //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
            //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
            //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
            //$unifiedOrder->setParameter("openid","XXXX");//用户标识
            //$unifiedOrder->setParameter("product_id","XXXX");//商品ID

            $prepay_id = $unifiedOrder->getPrepayId();
            
            //=========步骤3：使用jsapi调起支付============
            $jsApi->setPrepayId($prepay_id);
            $jsApiParameters = $jsApi->getParameters();
             
            
             
         }
        
        $model = new Model_Member_Order();
        $info = $model->getOrderDetail($orderid);
        $lineinfo = ORM::factory('line')->where("id='{$info['lineid']}'")->find()->as_array();
        $startcity = ORM::factory('startplace')->where("id='{$lineinfo['startcity']}'")->find()->as_array();
        $lineinfo['startcity'] = $startcity['startcity'];
        if ($info['roombalance']>0&&$info['dingnum']%2==1) {
            $roombalance = $info['roombalance'];
        }
        if($info['usejifen'] != 0)
        {
            $jifeninfo = ORM::factory('member_jifen')->where("id={$info['usejifen']}")->find()->as_array();
            $deductprice = min($jifeninfo['jifen'], $info['needjifen']);
        }
        $totalprice = $info['price'] * $info['dingnum']+$info['childprice']*$info['childnum']+$roombalance-$deductprice;
        if($totalprice <= 0)
            $totalprice = 1;
        $info['depoist'] = $info['dingjin']*($info['dingnum']+$info['childnum']+$info['oldnum']);
        $info['totalprice'] = $totalprice;
        $cfg_pay_type=Common::getSysPara('cfg_pay_type');
        $pay_arr=explode(',',$cfg_pay_type);
        if(in_array(6,$pay_arr))
            $this->assign('isXianxia',1);
        $this->assign('paytypes',$pay_arr);
        $this->assign('info',$info);
        $this->assign('code',$code); 
        $this->assign('line',$lineinfo);
        $this->assign('jsApiParameters',$jsApiParameters);
        $this->display('public/fukuan');

    }
    /*
     * 进行支付页面
     * */
    public function action_dopay()
    {
       $orderid = Arr::get($_POST,'orderid');
       $paytype = Arr::get($_POST,'paytype');
       $info = ORM::factory('member_order',$orderid)->as_array();
        if(intval($info['dingjin'])>0){
            $totalprice = $info['dingjin']*($info['dingnum']+$info['childnum']+$info['oldnum']);
        }else{
            if ($info['roombalance']>0&&$info['dingnum']%2==1) {
                $roombalance = $info['roombalance'];
            }
            $totalprice = $info['price'] * $info['dingnum']+$info['childprice']*$info['childnum']+$roombalance;
        }
       if($paytype==0)
       {
           header('Location:'.$GLOBALS['cfg_cmspath'].'user/orderlist');
           exit;
      }
        if($info['ispay']==1 && $info['status']==2) {
              header('Location:'.URL::site().'user/order_detail/orderid/'.$orderid);
              exit;
        }
      if ($paytype==1) {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            if (strpos('s'.$user_agent, 'MicroMessenger')) {
                header('Location:'.URL::site().'page/alipay/orderid/'.$orderid);
                exit;
            }
      }
       echo Common::payOnline($info['ordersn'],$info['productname'],$totalprice,$paytype);

    }
    
    public function action_alipay() {
        $orderid = $this->params['orderid'];
        $paytype = 1;
        $info = ORM::factory('member_order',$orderid)->as_array();
        if(intval($info['dingjin'])>0){
            $totalprice = $info['dingjin']*($info['dingnum']+$info['childnum']+$info['oldnum']);
        }else{
            if ($info['roombalance']>0&&$info['dingnum']%2==1) {
                $roombalance = $info['roombalance'];
            }
            $totalprice = $info['price'] * $info['dingnum']+$info['childprice']*$info['childnum']+$roombalance;
        }
        if($info['ispay']==1 && $info['status']==2) {
            header('Location:'.URL::site().'user/order_detail/orderid/'.$orderid);
            exit;
        }
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos('s'.$user_agent, 'MicroMessenger')) {
            $this->assign('orderid',$orderid);
            $this->assign('info',$info);
            $this->assign('line',$lineinfo);
            $this->assign('roombalance',$roombalance);
            $this->assign('totalprice',$totalprice);
            $this->assign('price',$info['price'] * $info['dingnum']+$info['childprice']*$info['childnum']);
            $this->display('public/alipay');
            
        } else {
            echo Common::payOnline($info['ordersn'],$info['productname'],$totalprice,$paytype);
        }
    }


    /*
     *
     * 评论公共显示列表
     * */
    public function action_pinlun()
    {
        $articleid = $this->params['id'];
        $typeid = $this->params['typeid'];
        $action = $this->params['action'];
        $page = $this->params['page'];
        $table_arr = array(
            '1'=>'line',
            '2'=>'hotel',
            '3'=>'car',
            '5'=>'spot',
            '8'=>'visa',
            '13'=>'tuan'
        );

        $module = $table_arr[$typeid];
        $row =ORM::factory($module)->where("id=$articleid")->find()->as_array();
        $row['score'] = Model_Comment::getScore($articleid,$typeid);
        $row['commentnum'] = Model_Comment::getPinLunCount($articleid,$typeid);
        $page = $page ? $page : 1;
        $pagesize = 10;
        $offset = ($page-1)*$pagesize;
        $sql = "select * from sline_comment where articleid='$articleid' and typeid='$typeid' limit {$offset},{$pagesize}";
        $pl = DB::query(1,$sql)->execute()->as_array();
        foreach($pl as $key=>$v)
        {
            $score = $pl[$key]['score1']*20;
            $memberinfo = Common::getMemberInfo($v['memberid']);
            $pl[$key]['memberico']= $memberinfo['litpic'] ? $memberinfo['litpic'] : Common::getDefaultImage();
            $pl[$key]['membername'] = $memberinfo['nickname'];
            $pl[$key]['membercore'] = $score.'%';
        }

        if($action == 'ajax')
        {
            echo json_encode($pl);
            exit();
        }
        $this->assign('pinlunlist',$pl);
        $this->assign('info',$row);
        $this->assign('typeid',$typeid);
        $this->display('public/pinlun');
    }

    //支付成功页面
    public function action_paysuccess()
    {
        $this->display('public/success');
    }

    public function action_query()
    {
        $this->display('public/query_order');
    }

    //订单查询页面
    public function action_queryorder()
    {
        $mobile = Common::pregReplace(Arr::get($_POST,'mobile'),2);
        if(empty($mobile))
        {
            Common::showMsg('请填写手机号进行查询',-1);
        }

        $model = new Model_Member_Order();
        $order = $model->getOrderListByMobile($mobile);
        $this->assign('orderlist',$order);
        $this->display('public/query_order');

    }

    private function checkMid()
    {
        $this->user = $GLOBALS['userinfo'];
        $this->mid = $this->user['mid'] ? $this->user['mid'] : 0;
        if(empty($this->mid))
         $this->request->redirect('user/login');
    }
	 



}
