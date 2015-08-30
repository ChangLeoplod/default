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
<title>确认支付</title>
 {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
 {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">确认支付</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main"> 
         <div class="confirmation-order">
              <div class="canshu bg-white  pl10 pr10 bte3 bbe3 mt10">
                  <table class="table table-striped grey m0">
                        <tr>
                          <th scope="row" width="30%">产品名：</th>
                          <td width="70%">{$info['productname']}</td>
                        </tr>
                        <tr>
                          <th scope="row">订单号：</th>
                          <td>{$info['ordersn']}</td>
                        </tr>
                        <tr>
                          <th scope="row">出游日期：</th>
                          <td>{$info['usedate']}<i class="date pull-right"></i></td>
                        </tr>
                        <tr>
                          <th scope="row">联系方式：</th>
                          <td>{$info['linkman']},{$info['linktel']}</td>
                        </tr>
                        <tr>
                          <th scope="row">出发城市：</th>
                          <td>{$lineinfo['startcity']}</td>
                        </tr>
                    </table>
              </div>
              
              <div class="canshu contact bg-white  pl10 pr10 bte3 bbe3 mt10">
                   <table class="table table-striped grey m0">
                        <tr>
                          <th scope="row" width="30%">实际支付：</th>
                          <td width="70%"><span class="price">¥ <em class="font20">{$info['totalprice']}</em></span></td>
                        </tr>
                    </table>    
              </div>
              
              <div class="canshu alipay bg-white p10 bte3 bbe3 mt10 o-hidden"  id="zhifu">
                   <div class="bbe3"><div class="mb10">选择支付方式</div></div>
                   <table class="table table-striped grey m0">
                        {if in_array(8,$paytypes)}
                        <tr id="weixin_btn" data-value="3">
                            <th scope="row" width="20%"><div class="icon"><img src="../../../public/images/icon/chn_wechat.png"></div></th>
                            <td width="80%">
                                <h5 class="m0">微信支付</h5>
                                <p class="grey font12 m0">选择支付方式，免费抽奖iPhone6</p>
                            </td>
                            <td align="right"  width="8%"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                        {if in_array(1,$paytypes)}
                        <tr id="zhifubao" data-value="1">
                            <th scope="row"><div class="icon icon3"><img src="../../../public/images/icon/Alibabai_Alipay.png"></div></th>
                            <td>
                                <h5 class="m0">支付宝支付</h5>
                                <p class="grey font12 m0">超过3亿人使用，最安全的支付工具！</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                        {if in_array(2,$paytypes)}
                        <tr id="yinlian" data-value="2">
                            <th scope="row"><div class="icon icon2"><img src="../../../public/images/icon/visa.png"></div></th>
                            <td>
                                <h5 class="m0">银联支付</h5>
                                <p class="grey font12 m0">支持各大银行卡和信用卡网银支付</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                    </table> 
              </div>
              
         </div>
    </div>
 
    
</div>

<form method="post" action="{$cmsurl}page/dopay" id="payfrm">
    <input type="hidden" name="orderid" value="{$info['id']}"/>
    <input type="hidden" name="paytype" id="paytype" value="0">
</form>

    
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

<script>
    $(function(){
        $('#zhifu tr').click(function(){
            $("#paytype").val($(this).attr('data-value'));
            if ($(this).attr('data-value')==3) {
                callpay();               
                
            } else {
                $("#payfrm").submit();
            }

            
        })

        if(!isWeiXin())
        {
            $("#weixin_btn").hide();
        }
        
        
        function jsApiCall()
        {
                WeixinJSBridge.invoke(
                        'getBrandWCPayRequest',{$jsApiParameters},
                        function(res){
                            WeixinJSBridge.log(res.err_msg);
                               $.ajax({
                                    type:"post",
                                    url:"{$cmsurl}order/check",
                                    data:{"orderid":{$info['id']}},
                                    dataType:'json',
                                    success: function(data){
                                        if(data.status == 2){
                                            if(data.ispay==1) {
                                               location.href = '{$cmsurl}user/order_detail/orderid/{$info['id']}';
                                            }
                                        }
                                    }
                                });
                        }
                );
        }

        function callpay()
        {
                if (typeof WeixinJSBridge == "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                    }
                }else{
                    jsApiCall();
                }
        }
       
                
    })

    function isWeiXin(){ 
        var ua = window.navigator.userAgent.toLowerCase(); 
        if(ua.match(/MicroMessenger/i) == 'micromessenger'){ 
            return true; 
        }else{ 
            return false; 
    } 
} 
</script>
</body>
</html>
