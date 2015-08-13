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
<title>{$seotitle}-{$webname}</title>
 {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
 {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
<script type="text/javascript">
function errorMessage(obj){
  $(obj).parent().children(".error-message").show().delay(2000).hide(0);
};
</script>
</head>

<body>
<style>body{ background:url(../public/images/add/in.jpg) no-repeat;background-size:cover; }</style>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">登录</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}user/orderlist" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main"> 
         <div class="modify-common-passenger sign-in p15">
              <form action="{$cmsurl}user/dologin" method="post" onsubmit="return loginFrm();"> 
              <div class="user-images text-center white"> 
                  <div class="bg-white"><img src="../public/images/add/touxiang.png"></div>
              </div>
              
              <div class="confirmation-order">
                  
                   <div class="canshu contact bg-white p10 mt10">
                       <table class="table table-striped grey m0">
                            <tr>
                              <th scope="row" width="30%">手机号码：</th>
                              <td align="right"  width="70%"><input type="text" class="username form-control" value="" name="mobile" id="mobile" placeholder="请输入手机号码"></td>
                            </tr>
                            <tr>
                              <th scope="row">登录密码：</th>
                              <td align="right"><input type="password" class="password form-control" value="" name="password" id="password" placeholder="请输入密码"></td>
            <input type="hidden" name="backurl" value="{$backurl}">
            <input type="hidden" name="forwardurl" value="{$forwardurl}">
                            </tr>
                        </table>    
                  </div>
                  
              </div> 
              
              <div class="mt10" >
                  <input class="login_in btn w100 p10 font16 white mt10" name="" type="submit" value="登陆">
                 <div class="error-message affix">
                      <div class="affix font12 p10 white text-center">账号或密码错误</div>
                 </div> 
              </div>
              
              <div class="mt10">
                  <a href="{$cmsurl}user/register?forwardurl={$forwardurl}"><button type="button" class="btn font16 p10 white mt10 pull-left bg-green" style="padding:10px 18px;">
                    5秒注册
                      </button></a>
                  <a href="{$cmsurl}user/findpass?forwardurl={$forwardurl}"><button type="button" class="btn font16 p10 mt10 pull-right bg-grey grey" style="padding:10px 18px;">
                    忘记密码
                      </button></a>
              </div>
              </form>
               
              
         </div>
    </div>
 
    
</div>

<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
<script>
    function loginFrm()
    {
        var pwd = $("#password").val();
        var mobile = $("#mobile").val();
        var pattern = /^0?1[3|4|5|8][0-9]\d{8}$/ig;//手机

        if(!pattern.test(mobile)){
            alert('请输入正确的手机号码');
            return false;
        }
        if(pwd.length < 6){
            alert('密码长度最低为6位');
            return false;
        }

        return true;
    }

</script>
</body>
</html>
