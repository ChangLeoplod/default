<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />

  <title>领取现金券活动 - {$webname}</title>
    {php echo Common::getScript('jquery.min.js'); }
    {php echo Common::getCss('a1.css,amazeui.min.css'); }
</head>

<body>
	<div class="toptext">庆祝积沙旅行获百万级人民币天使投资</div>
    
        <div class="tops"><img src="../../../../public/images/campaign/activity1/a1_bg1.png" width="100%"/></div>
    <div class="fd">
        <div class="onin">
        	<div class="xjq"><img src="../../../../public/images/campaign/activity1/xjq.png" width="70%"/></div>
            <div><input type="tel" value="请输入手机号领取" size="16" onClick="$('#mobile').val('')" id="mobile"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"></div>
            <div><img src="../../../../public/images/campaign/activity1/btn_fx2.png" width="100%" onClick="show()"/></div>
        </div>
    </div>
    
    <div class="tops2">
        <img src="../../../../public/images/campaign/activity1/jslogo.png" width="60%"/><br>
        获得百万级人民币天使投资<br>
        致力为年轻人打造有趣的自由行服务
    </div>
    <div class="btns">
    	<img src="../../../../public/images/campaign/activity1/a1_b1.png" width="100%"/>
        <img src="../../../../public/images/campaign/activity1/a1_b2.png" width="100%"/>
        <img src="../../../../public/images/campaign/activity1/a1_b3.png" width="100%"/>
    </div>
    <div class="show33"><img src="../../../../public/images/campaign/activity1/33.png" width="100%" onClick="$('.show33').hide()"/></div>
    <div class="show44"><img src="../../../../public/images/campaign/activity1/44.png" width="100%"  onClick="$('.show44').hide()"/></div>
    
    <script language="javascript">
        function show(){
            var mobile=$('#mobile').val();
            var pattern = /^0?1[0-9][0-9]\d{8}$/ig;//手机
            if(!pattern.test(mobile)){
                alert('请输入正确的手机号');
                return false;
            }
            $.ajax({
            type:"post",
            url:"{$cmsurl}campaign/apply_jifen",
            data:{"mobile":mobile},
            dataType:'json',
            success:function(data){
                if(data.status)
                {
                    $('.fd').html(data.outstr);
                }
                else
                {
                    alert(data.msg);
                }
            }
            }).done(function(){
                return true;
            });
        }
    </script>
    
</body>
</html>