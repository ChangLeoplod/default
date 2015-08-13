<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<title><?php echo $seotitle;?>-<?php echo $webname;?></title>
 <?php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js,send.js'); ?>
 <?php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); ?>
</head>
<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">注册</li>
         <li class="pull-right li3"><a href="<?php echo $cmsurl;?>user/index" class="baseicon block pull-right member"></a><a href="<?php echo $cmsurl;?>user/orderlist" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
<form method="post" action="<?php echo $cmsurl;?>user/doreg" onsubmit="return checkFrm();">
    <div class="main"> 
         <div class="modify-common-passenger p15">
              <div class="confirmation-order"> 
                   <div class="canshu contact bg-white mt10">
                       <table class="table table-striped grey m0">
                            <tr>
                              <th scope="row" width="30%">手机号码：</th>
                              <td align="right"  width="70%"><input type="text" class="username focus form-control" name="mobile" id="mobile" value="" placeholder="手机号码" /></td>
                            </tr>
                            <tr>
                              <th scope="row">短信验证：</th>
                              <td align="right">
                                <input type="text" class="yzm_txt focus form-control w50 pull-left" id="checkcode" name="checkcode" value="" placeholder="验证码" />
                                <button type="button" id="MobileInvCode" class="form-control bg-green white w40 pull-right font10">发送验证码</button>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">密码：</th>
                              <td align="right"><input type="password" class="password form-control input_group_input" name="password" id="password" value="" placeholder="请输入密码"/></td>
                            </tr>
                            <tr>
                              <th scope="row">确定密码：</th>
                              <td align="right"><input type="password" class="password form-control input_group_input" name=repassword id="repassword" placeholder="请再次输入密码" value="" /></td><input type="hidden" name="backurl" value="<?php echo $backurl;?>"/>
                            </tr>
                        </table>    
                  </div>
              </div> 
              
              <div class="mt10">
                  <input type="submit" class="btn w100 p10 font16 white mt10" value="注册" />
              </div>
              
              <a href="#" class="block p10 text-center mt10">登陆帐号</a>
              
         </div>
    </div>
 
</form>
</div>
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
 <script>
     function checkFrm()
    {
        var mobile = $("#mobile").val();
        var pwd = $("#password").val();
        var repassword = $("#repassword").val();
        var checkcode = $("#checkcode").val();
        var pattern = /^0?1[0-9][0-9]\d{8}$/ig;//手机
        if(!pattern.test(mobile)){
            alert('请输入正确的手机号码');
            return false;
        }
        if(pwd.length < 6){
            alert('密码长度最低为6位');
            return false;
        }
        if(pwd!=repassword){
            alert('两次密码输入不一致');
            return false;
        }
        if(checkcode.length<=0){
            alert('请输入验证码');
            return false;
        }
        return true;
    }
$(function(){
$('#MobileInvCode').click(function(){
        var mobile = $("#mobile").val();
        var regPartton=/1[3-8]+\d{9}/;
        if (!regPartton.test(mobile))
        {
            alert('请输入正确的手机号码');
            return false;
        }
            var url = "<?php echo $cmsurl;?>user/sendmsg?mobile="+mobile;
            $.post(url,true,function(data) {
                if(data.status)
                {
                    CodeTimeout(60);
                    return false;
                }
                else
                {
                   alert(data.msg);
                   return false;
                }
            },'json');
        });
});
</script>
</body>
</html>
