<?php defined('SYSPATH') or die('No direct script access.');
class Controller_User extends Stourweb_Controller{

    private $user = null;
    private $mid = null;

    public function before()
    {
        parent::before();
        $refer_url = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : $GLOBALS['cfg_cmsurl'];
        $this->assign('backurl',$refer_url);
        $this->user = $GLOBALS['userinfo'];
        $this->mid = $this->user['mid'] ? $this->user['mid'] : 0;
    }

    /*用户注册页面*/
    public function action_register()
    {
        if(isset($GLOBALS['userinfo']['mid']))
        {
            
            $this->request->redirect('/');

        }
        $forwardurl = Arr::get($_GET,'forwardurl');
        if(!empty($forwardurl)){
            $this->assign('backurl',$forwardurl); 
        } else {
           $this->assign('backurl',URL::site()); 
        }
       
        $this->display('user/register');
    }
     /*发送验证码*/
    public function action_sendmsg()
    {
        $mobile = Arr::get($_GET,'mobile');
        $f = Arr::get($_GET,'f');
        @session_start();
        $curtime=time();
        $_SESSION['total_value']='';

        if(empty($mobile))
        {
            echo json_encode(array('status'=>false,'msg'=>'手机号不能为空'));
            exit;
        }
        else
        {
            $flag = Model_Member::checkExist('mobile',$mobile);
            if(!$flag&&!$f==1)
            {
                echo json_encode(array('status'=>false,'msg'=>'手机号已经注册'));
                exit;
            }
            if($flag&&$f==1)
            {
                echo json_encode(array('status'=>false,'msg'=>'手机号没有注册'));
                exit;
            }
               $sentNum=$_SESSION['sendnum_'.$mobile]; //已发验证码次数
               $lastSentTime=$_SESSION['senttime_'.$mobile];//上次发送时间
               $sentNum=empty($sentNum)?0:$sentNum;
               $lastSentTime=empty($lastSentTime)?0:$lastSentTime;

               if($sentNum<3&&$sentNum>0&&$lastSentTime>($curtime-60))
               {
                   echo json_encode(array('status'=>false,'msg'=>'验证码发送过于频繁，请稍后再试'));
                   exit;
               }

               if($sentNum>=3&&$lastSentTime>($curtime-60*15))
               {
                   echo json_encode(array('status'=>false,'msg'=>'验证码发送过于频繁，15分钟后再试'));
                   exit;
               }

                $code = '';//验证码
                for ($i=1; $i<=5; $i++)
                {
                    $code.=mt_rand(0,9);
                }
                $_SESSION['msgcode'] = $code;
                $msgInfo = Model_Sms::getSms();

                
                
                $content = $msgInfo['msg'];
                $content = str_replace('{#CODE#}',$code,$content);
                $content = str_replace('{#WEBNAME#}',$GLOBALS['cfg_webname'],$content);
                $content = str_replace('{#PHONE#}',$GLOBALS['cfg_phone'],$content);
                $flag = Common::sendMsg($mobile,'',$content);
                

                if($flag->Success)//发送成功
                {
                    $_SESSION['senttime_'.$mobile]=$curtime;
                    $sentNum=$sentNum>=3?0:$sentNum+1;
                    $_SESSION['sendnum_'.$mobile]=$sentNum;
                    $_SESSION['mobilecode_'.$mobile]=$code;
                    echo json_encode(array('status'=>true,'msg'=>'验证码发送成功'));
                    exit;
                }
                else
                {
                    echo json_encode(array('status'=>false,'msg'=>'验证码发送失败，请重试'.$flag->Message));
                    exit;
                }

        }
    }
    
    

   /*执行用户注册*/
    public function action_doreg()
    {
        $mobile = Arr::get($_POST,'mobile');
        $pwd = Arr::get($_POST,'password');
        $repwd = Arr::get($_POST,'repassword');
        $f = Arr::get($_POST,'f');
        $checkcode = Arr::get($_POST,'checkcode');
        $backurl = Arr::get($_POST,'backurl');
        if (!$backurl) {
            $backurl ='/';
        }
        if(!$mobile)
        {
            echo json_encode(array('status'=>false,'msg'=>'手机号码不能为空,请重新填写','url'=>''));
            exit;
            //Common::showMsg('手机号码不能为空,请重新填写','-1');
        }
        if(!$pwd)
        {
            echo json_encode(array('status'=>false,'msg'=>'密码不能为空,请重新填写','url'=>''));
            exit;
            //Common::showMsg('密码不能为空,请重新填写','-1');
        }
        if(strlen($pwd)<6)
        {
            echo json_encode(array('status'=>false,'msg'=>'密码必须大于六位,请重新填写','url'=>''));
            exit;
            //Common::showMsg('密码必须大于六位,请重新填写','-1');
        }
        if($repwd!=$pwd)
        {
            echo json_encode(array('status'=>false,'msg'=>'二次密码不一致,请重新填写','url'=>''));
            exit;
            //Common::showMsg('二次密码不一致,请重新填写','-1');
        }
        //验证码
        $checkcode=strtolower($checkcode);
        $flag = Model_Member::checkExist('mobile',$mobile);
        if(!$flag&&$f<>1)
        {
            echo json_encode(array('status'=>false,'msg'=>'手机号码重复,请重新填写','url'=>''));
            exit;
            //Common::showMsg('手机号码重复,请重新填写','-1');
        }
        @session_start();
        if($_SESSION['mobilecode_'.$mobile]!=$checkcode)
        {
            echo json_encode(array('status'=>false,'msg'=>'验证码错误','url'=>''));
            exit;
            //Common::showMsg('验证码错误','-1');
        }
        if($f==1) {
            $member = ORM::factory('member')->where(mobile,'=',$mobile)->find()->as_array();
            if ($member) {
                $model = ORM::factory('member')->where('mid','=',$member['mid'])->find();
                $model->pwd = md5($pwd);
                $model->update();
                if($model->saved()) //找回密码成功
                {
                    Model_Member::login($mobile,$pwd);
                    echo json_encode(array('status'=>true,'msg'=>'密码修改成功'));
                    exit;
                    //Common::showMsg('密码修改成功',$backurl);
                }
            }
        } else {
            $model = ORM::factory('member');
            $model->mobile = $mobile;
            $model->pwd = md5($pwd);
            $model->logintime = time();
            $model->nickname = substr_replace($mobile,'***',3,3);
            $model->save();
            if($model->saved()) //注册成功
            {
                Model_Member::login($mobile,$pwd);
                echo json_encode(array('status'=>true,'msg'=>'注册成功'));
                exit;
                //Common::showMsg('注册成功',$backurl);
            }
            else
            {
                //Common::showMsg('注册失败,请联系网站管理员','-1');
            }
        }
    }

    /*
     * 用户登陆页面
     * */
    public function action_login()
    {
        if(!empty($GLOBALS['userinfo']['mid']))
        {
            header("location:{$_SERVER['HTTP_REFERER']}");
            exit();
        }
        $forwardurl = Arr::get($_GET,'forwardurl');
        $this->assign('forwardurl',$forwardurl);
        $this->display('user/login');
    }

    /*找回密码*/
    public function action_findpass()
    {
        if(isset($GLOBALS['userinfo']['mid']))
        {
            
            $this->request->redirect('/');

        }
        $forwardurl = Arr::get($_GET,'forwardurl');
        if(!empty($forwardurl)){
            $this->assign('backurl',$forwardurl); 
        } else {
           $this->assign('backurl',URL::site()); 
        }
       
        $this->display('user/findpass');
    }
    
    public function action_dologin()
    {
        $mobile = Arr::get($_POST,'mobile');
        $pwd = Arr::get($_POST,'password');
        //$backurl = Arr::get($_POST,'backurl');
        //$forwardurl = Arr::get($_POST,'forwardurl');
        $userinfo = Model_Member::login($mobile,$pwd);
        if(!empty($userinfo['mid']))
        {
            //$redirecturl = !empty($forwardurl) ? $forwardurl : $backurl;
            //Common::showMsg('',$redirecturl);
            echo json_encode(array('status'=>true,'msg'=>'登陆成功'));
            exit;
        }
        else
        {
            //Common::showMsg('登陆失败,请检查用户名或密码是否正确','-1');
            echo json_encode(array('status'=>false,'msg'=>'用户或者密码错误'));
            exit;
        }
    }

    /*
     * 用户中心首页
     * */
    public function action_index()
    {
        self::checkMid();
        $this->display('user/index');
    }

    /*
     * 订单列表
     * */
    public function action_orderlist()
    {
      self::checkMid();
      file_put_contents('/tmp/log', 'test file_put_contents');
      $model = new Model_Member_Order();
      $order = $model->getOrderList($this->mid);
      $this->assign('orderlist',$order);
      $this->assign('page',1);
      $this->display('user/order_list');
    }
    /*
     * 常用旅游列表
     * */
    public function action_commontourers()
    {
        self::checkMid();
        $tourers = ORM::factory('member_set')->where("mid='$this->mid'")->get_all();
        $tourer_count = count($tourers);
        $this->assign('mid',$this->mid);
        $this->assign('count',$tourer_count);
        $this->assign('tourers',$tourers);
        $this->display('user/common_tourers');
    }
    
    /*
     * 删除联系人
     * */
    public function action_deletetourer()
    {
        self::checkMid();
        $tourerid = Arr::get($_POST,'tourerid');
        //判断id是否存在
        $tourerinfo = ORM::factory('member_set')->where("id='$tourerid'")->find()->as_array();
        if($tourerinfo['id'])
        {
            $tourer_model = ORM::factory('member_set', $tourerid);
            $tourer_model->delete();
            echo json_encode(array('status'=>true,'msg'=>'删除常用联系人成功'));
            exit;
            //$this->action_commontourers();
        }
        else
        {
            echo json_encode(array('status'=>false,'msg'=>'该联系人信息有误'));
            exit;
        }
        
    }
    
    /*
     * 编辑联系人
     * */
    public function action_edittourer()
    {
        self::checkMid();
        $tourerid = $this->params['tourerid'];
        //判断id是否存在
        $tourerinfo = ORM::factory('member_set')->where("id='$tourerid'")->find()->as_array();
        if($tourerinfo['id'])
        {
            $this->assign('tourer',$tourerinfo);
            $this->display('user/edit_tourer');
        }
        else
        {
            $this->action_commontourers();
        }
    }
    
    /*
     * 新增联系人
     * */
    public function action_addtourer()
    {
        self::checkMid();
        $this->assign('mid',$this->mid); 
        $this->display('user/edit_tourer');
    }
    
    /*
     * 保存更改
     * */
    public function action_savetourer()
    {
        self::checkMid();
        $id = Arr::get($_POST,'id');
        $mid = Arr::get($_POST,'mid');
        $name = Arr::get($_POST, 'name');
        $mobile = Arr::get($_POST,'mobile');
        $email = Arr::get($_POST, 'email');
        $ppno = Arr::get($_POST,'ppno');
        $idno = Arr::get($_POST, 'idno');
        
        if(!$name)
        {
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的旅客名称'));
            exit;
            //Common::showMsg('请填写正确的旅客名','-1');
        }
        if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$mobile)){
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的手机号码'));
            exit;
            //Common::showMsg('请填写正确的手机号','-1');
        }
        if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$email)){    
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的邮箱'));
            exit;
            //Common::showMsg('请填写正确的邮箱','-1');
        }
        if(!preg_match("/^1[45][0-9]{7}|G[0-9]{8}|P[0-9]{7}|S[0-9]{7,8}|D[0-9]+$/",$ppno))
        {
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的护照号'));
            exit;
            //Common::showMsg('请填写正确的护照号', '-1');
        }
        if(!preg_match("/^((1[1-5])|(2[1-3])|(3[1-7])|(4[1-6])|(5[0-4])|(6[1-5])|71|(8[12])|91)\d{4}((19\d{2}(0[13-9]|1[012])(0[1-9]|[12]\d|30))|(19\d{2}(0[13578]|1[02])31)|(19\d{2}02(0[1-9]|1\d|2[0-8]))|(19([13579][26]|[2468][048]|0[48])0229))\d{3}(\d|X|x)?$/",$idno)){    
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的身份证号码'));
            exit;
            //Common::showMsg('请填写正确的身份证号码','-1');
        }
        
        //修改
        if($id)
        {
            $tourer_model = ORM::factory('member_set', $id);
            $tourer_model->name = $name;
            $tourer_model->mobile = $mobile;
            $tourer_model->email = $email;
            $tourer_model->idno = $idno;
            $tourer_model->ppno = $ppno;
            $tourer_model->update();
            if($tourer_model->saved())
            {
               echo json_encode(array('status'=>true,'msg'=>'修改常用联系人信息成功'));
            }
            else
            {
                echo json_encode(array('status'=>false,'msg'=>'修改常用联系人信息失败'));
            }
            exit;
            
        }
        //新增
        else
        {
            $tourer_model = ORM::factory('member_set');
            $tourer_model->mid = $mid;
            $tourer_model->name = $name;
            $tourer_model->mobile = $mobile;
            $tourer_model->email = $email;
            $tourer_model->idno = $idno;
            $tourer_model->ppno = $ppno;
            $tourer_model->intime = time();
            $tourer_model->save();
            if($tourer_model->saved())
            {
                echo json_encode(array('status'=>true,'msg'=>'新增常用联系人成功'));
            }
            else
            {
                echo json_encode(array('status'=>true,'msg'=>'新增常用联系人失败'));
            }
            exit;
        }
    }
    //订单查看更多
    public function action_ajax_order_more()
    {
        $out = array();
        $page = Arr::get($_POST,'page');//当前页数
        $model = new Model_Member_Order();
        $order = $model->getOrderList($this->mid,5,$page);

        if(!empty($order))
        {
            $out['status'] = 'success';
            $out['orderlist'] = $order;
        }
        else
        {
            $out['status'] = 'failure';
            $out['pagenum'] = $page;
        }
        echo json_encode($out);
        exit;

    }

    //订单详情
    public function action_order_detail()
    {
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
                $backurl = 'http://'.$_SERVER["SERVER_NAME"].'/user/order_detail/orderid/'.$orderid;
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
            $deductprice = 0;
            if($info['needjifen']!=0 && $info['usejifen']!=0)
            {
                $jifeninfo = ORM::factory('member_jifen')->where("id={$info['usejifen']}")->find()->as_array();
                $deductprice = min($jifeninfo['jifen'], $info['needjifen']);
            }
            $total_fee = (intval($info['price']) * intval($info['dingnum']))+(intval($info['childprice'])*intval($info['childnum']))+$roombalance-$deductprice;
            if($total_fee <= 0)
                $total_fee = 1;
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
        $order = $model->getOrderDetail($orderid);
        $this->assign('jsApiParameters',$jsApiParameters);
        $this->assign('order',$order);
        $this->display('user/order_detail');
    }

    //评论列表
    public function action_pinlunlist()
    {
        self::checkMid();
        $pinlunlist = array();
        $model = new Model_Member_Order();
        $orderlist = $model->getOrderList($this->mid,5,1,1);
        foreach($orderlist as $order )
        {

            $pinlun = $model->getOrderPinlun($order['id']);

            if(isset($pinlun['id']))
            {
                $order['pinlun'] = $pinlun;
                array_push($pinlunlist,$order);

            }
        }
        $this->assign('orderlist',$pinlunlist);
        $this->display('user/pinlun_list');

    }

    //评论查看更多
    public function action_ajax_pinlun_more()
    {
        $out = array();
        $page = Arr::get($_POST,'page');//当前页数
        $model = new Model_Member_Order();
        $order = $model->getOrderList($this->mid,1,$page,1);
        $pinlunlist = array();
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $pinlun = $model->getOrderPinlun($o['id']);

                if(isset($pinlun['id']))
                {
                    $o['pinlun'] = $pinlun;
                    array_push($pinlunlist,$o);
                }

            }
            $out['status'] = 'success';
            $out['orderlist'] = $pinlunlist;
        }
        else
        {
            $out['status'] = 'failure';
        }

        echo json_encode($out);
        exit;

    }

   /*
    * 点评某个订单
    * */
    public function action_pinlun()
    {
        $orderid = $this->params['orderid'];
        $model = new Model_Member_Order();
        $order = $model->getOrderDetail($orderid);
        $this->assign('order',$order);
        $this->display('user/order_writepl');
    }
    /*
     * ajax保存点评
     * */
    public function action_ajax_save_pl()
    {

        $leavemsg = Arr::get($_POST,'leavemsg');
        $orderid = Arr::get($_POST,'orderid');
        $articleid = Arr::get($_POST,'articleid');
        $typeid = Arr::get($_POST,'typeid');
        $score = Arr::get($_POST,'score');
        $model = ORM::factory('comment');
        $model->memberid = $this->mid;
        $model->orderid = $orderid;
        $model->content = $leavemsg;
        $model->score1 = $score;
        $model->articleid = $articleid;
        $model->typeid = $typeid;
        $model->save();
        if($model->saved())
        {
            $status = 'success';
            $order_m = ORM::factory('member_order',$orderid);
            $order_m->ispinlun = 1;
            $order_m->save();
        }
        else
        {
            $status = 'failure';
        }
        echo json_encode(array('status'=>$status));
    }

    /*
     * 退出登陆
     * */
    public function action_loginout()
    {
        $session = Session::instance();
        $session->delete('mobile');
        Cookie::delete('mobile');
        Common::showMsg('',$GLOBALS['cfg_cmspath']);


    }

    private function checkMid()
    {
        if(empty($this->mid))
            $this->request->redirect('user/login');
    }
     




}
