<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Campaign extends Stourweb_Controller{
    public function before()
    {
        parent::before();
    }
    public function action_activity1_index()
    {
        $this->display('campaign/activity1_index');
    }
    //申请积分券
    public function action_apply_jifen()
    {
        $mobile = Arr::get($_POST,'mobile');
        if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$mobile)){
            echo json_encode(array('status'=>false,'msg'=>'请填写正确的手机号码'));
            exit;
        }
        //test 用例
//        $out['status'] = true;
//        $out['outstr'] = '<div class="onout">
//                    <div class="coinbg"><div class="coinmoney"><span>'.$jifen.'</span>元</div></div>
//                    <div class="infs">现金券已放入'.$mobile.'&nbsp;<a href="#" onClick='."$('.show33').show()".'>使用规则</a></div>
//                    <div><a href="#" onClick='."$('.show44').show()".'><img src="../../../../public/images/campaign/activity1/btn_fx.png" width="100%"/></a></div>
//                    <div class="dfe">
//                    <img src="../../../../public/images/campaign/activity1/12.jpg" width="40%" /><br>
//                    按住二维码关注公众号，立即进入
//                    </div>
//                </div>';
//        echo json_encode($out);
//        exit;
        @session_start();
        //$lastSentTime=$_SESSION['applytime_'.$mobile];//上次申请时间
        $lastSentTime=$_SESSION['applytime_'];//上次申请时间
        $curtime=time();
        if($lastSentTime>($curtime-60*5))
        {
            echo json_encode(array('status'=>false,'msg'=>'已经申请过现金券了，5分钟后再试'));
            exit;
        }
        $_SESSION['applytime_']=$curtime;
        
        $member = ORM::factory('member')->where(mobile,'=',$mobile)->find()->as_array();
        //已经注册过的用户
        if(!empty($member['mid']))
        {
            $memberid = $member['mid'];
            $jifeninfo = ORM::factory('member_jifen')->where("memberid = '$memberid' and activeid = 1")->find()->as_array();
            if(!empty($jifeninfo['id']))
            {
                echo json_encode(array('status'=>false,'msg'=>'该号码已经领取过本次活动的现金券了'));
                exit;
            }
            else
            {
                $jifen=self::update_jifen($memberid);
                $out['status'] = true;
                $out['outstr'] = '<div class="onout">
                            <div class="coinbg"><div class="coinmoney"><span>'.$jifen.'</span>元</div></div>
                            <div class="infs">现金券已放入'.$mobile.'&nbsp;<a href="#" onClick='."$('.show33').show()".'>使用规则</a></div>
                            <div><a href="#" onClick='."$('.show44').show()".'><img src="../../../../public/images/campaign/activity1/btn_fx.png" width="100%"/></a></div>
                            <div class="dfe">
                            <img src="../../../../public/images/campaign/activity1/12.jpg" width="40%" /><br>
                            按住二维码关注公众号，立即进入
                            </div>
                        </div>';
                echo json_encode($out);
                exit;
            }
        }
        else
        {
            //先在系统里面生成改用户
            $model = ORM::factory('member');
            $model->mobile = $mobile;
            $pwd = substr($mobile, -6);
            $model->pwd = md5($pwd);
            $model->jointime=time();
            $model->logintime = time();
            $model->nickname = substr_replace($mobile,'***',3,3);
            $model->save();
            if($model->saved()) //注册了新用户
            {   
                $member_model = ORM::factory('member')->where(mobile,'=',$mobile)->find()->as_array();
                $memberid = $member_model['mid'];
                $jifen=self::update_jifen($memberid);
                //发送短信
                $content = "【积沙旅行】 恭喜你已经注册为积沙旅行的会员，账户号为：".$mobile."，密码为：".$pwd."。并且领取了".$jifen."元现金券，请尽快使用";
                $flag = Common::sendMsg($mobile,'',$content);
                //返回给前端
                $out['status'] = true;
                $out['outstr'] = '<div class="onout">
                            <div class="coinbg"><div class="coinmoney"><span>'.$jifen.'</span>元</div></div>
                            <div class="infs">现金券已放入'.$mobile.'&nbsp;<a href="#" onClick='."$('.show33').show()".'>使用规则</a></div>
                            <div><a href="#" onClick='."$('.show44').show()".'><img src="../../../../public/images/campaign/activity1/btn_fx.png" width="100%"/></a></div>
                            <div class="dfe">
                            <img src="../../../../public/images/campaign/activity1/12.jpg" width="40%" /><br>
                            按住二维码关注公众号，立即进入
                            </div>
                        </div>';
                echo json_encode($out);
                exit;
            }
            exit;
        }
    }
    
    private function update_jifen($mid)
    {
        $jifen = rand(5,100);
        $currenttime = time();
        $jifen_model = ORM::factory('member_jifen');
        $jifen_model->activeid = 1;
        $jifen_model->memberid = $mid;
        $jifen_model->jifen = $jifen;
        $jifen_model->type = 1;
        $jifen_model->addtime = $currenttime;
        $jifen_model->expiredtime = $currenttime+3600*24*30;
        $jifen_model->isused = 0;
        $jifen_model->content = "输入手机号送现金券活动";
        $jifen_model->save();
        if($jifen_model->saved())
        {
            return $jifen;
        }
        return 0;
    }
}

