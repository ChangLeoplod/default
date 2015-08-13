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
                }
                else
                {
                    echo json_encode(array('status'=>false,'msg'=>'验证码发送失败，请重试'.$flag->Message));
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
            Common::showMsg('手机号码不能为空,请重新填写','-1');
        }
        if(!$pwd)
        {
            Common::showMsg('密码不能为空,请重新填写','-1');
        }
        if(strlen($pwd)<6)
        {
            Common::showMsg('密码必须大于六位,请重新填写','-1');
        }
        if($repwd!=$pwd)
        {
            Common::showMsg('二次密码不一致,请重新填写','-1');
        }
        //验证码
        $checkcode=strtolower($checkcode);
        $flag = Model_Member::checkExist('mobile',$mobile);
        if(!$flag&&$f<>1)
        {
            Common::showMsg('手机号码重复,请重新填写','-1');
        }
        @session_start();
        if($_SESSION['mobilecode_'.$mobile]!=$checkcode)
        {
            Common::showMsg('验证码错误','-1');
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
                    Common::showMsg('密码修改成功',$backurl);
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
                Common::showMsg('注册成功',$backurl);
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
        $backurl = Arr::get($_POST,'backurl');
        $forwardurl = Arr::get($_POST,'forwardurl');
        $userinfo = Model_Member::login($mobile,$pwd);
        if(!empty($userinfo['mid']))
        {
            $redirecturl = !empty($forwardurl) ? $forwardurl : $backurl;
            Common::showMsg('',$redirecturl);
        }
        else
        {
            Common::showMsg('登陆失败,请检查用户名或密码是否正确','-1');
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
      $model = new Model_Member_Order();
      $order = $model->getOrderList($this->mid);
      $this->assign('orderlist',$order);
      $this->assign('page',1);
      $this->display('user/order_list');
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
        }
        echo json_encode($out);
        exit;

    }

    //订单详情
    public function action_order_detail()
    {
        $orderid = $this->params['orderid'];
        $model = new Model_Member_Order();
        $order = $model->getOrderDetail($orderid);
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
