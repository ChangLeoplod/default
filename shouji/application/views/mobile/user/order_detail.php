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
<title>订单详情</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
        <ul class="m0 p0 w100">
            <li class="pull-left li1"><div class="baseicon return-left"></div></li>
            <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">
                {if $order['status']==0 || $order['status']==1}
                    待支付
                {elseif $order['status']==2} 
                    支付成功
                {elseif $order['status']==3}
                    已失效
                {/if}
            </li>
            <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="javascript:history.go(-1);" class="baseicon block pull-right date"></a></li>
        </ul>
    </header>
    
    <div class="main"> 
        <div class="confirmation-order">
            <div class="canshu bg-white  pl10 pr10 bte3 bbe3 mt10">
                <table class="table table-striped grey m0" >
                    <tr>
                        <th scope="row" width="30%">订单编号：</th>
                        <td width="70%">{$order['ordersn']}</td>
                    </tr>
                    <tr>
                        <th scope="row">订单状态：</th>
                        {if $order['status']==0 || $order['status']==1}
                            <td ><span class="orange mr10">待支付生效</span>过期时间：{$order['expireddate']}</td>
                        {elseif $order['status']==2} 
                            <td ><span class="pay-success">支付成功</span></td>
                        {elseif $order['status']==3}
                            <td ><span class="orange mr10">已失效</span>支付超时，请重新提交订单</td>
                        {/if}
                    </tr>
                    <tr>
                        <th scope="row">订单金额：</th>
                        <td ><span class="price">¥<em class="font18">{$order['totalprice']}</em></span></td>
                    </tr>
                    {if $order['jifencontent']}
                    <tr>
                        <th scope="row" width="30%">现金券：</th>
                        <td width="70%">{$order['jifencontent']}</td>
                    </tr>
                    {/if}
                </table>
            </div>

            <div class="canshu bg-white  pl10 pr10 bte3 bbe3 mt10">
                <table class="table table-striped grey m0">
                    <tr>
                        <th scope="row" width="30%">购买商品：</th>
                        <td width="70%">{$order['productname']}</td>
                    </tr>
                    <tr>
                        <th scope="row">套餐类型：</th>
                        <td >{$order['suitname']}</td>
                    </tr>
                    <tr>
                        <th scope="row">出发日期：</th>
                        <td >{$order['usedate']}</td>
                    </tr>
                    <tr>
                        <th scope="row">出发人数：</th>
                        <td >成人{$order['dingnum']}名，儿童{$order['childnum']}名</td>
                    </tr>
                    <tr>
                        <th scope="row">订单留言：</th>
                        <td >{$order['remark']}</td>
                    </tr>
                </table>
            </div>

            <div class="canshu bg-white  pl10 pr10 bte3 bbe3 mt10">
                <table class="table table-striped grey m0">
                    <tr>
                        <th scope="row" width="30%">联系人：</th>
                        <td width="70%">{$order['linkman']}</td>
                    </tr>
                    <tr>
                        <th scope="row">联系手机：</th>
                        <td >{$order['linktel']}</td>
                    </tr>
                    <tr>
                        <th scope="row">邮箱：</th>
                        <td >{$order['linkemail']}</td>
                    </tr>
                </table>
            </div>
            
            {if $order['tourers']}
                {loop $order['tourers'] $tourer}
                <div class="canshu bg-white  pl10 pr10 bte3 bbe3 mt10">
                    <table class="table table-striped grey m0">
                        <tr>
                            <th scope="row" width="30%">旅客{$n}：</th>
                            <td width="70%">{$tourer['tourername']}</td>
                        </tr>
                        <tr>
                            <th scope="row">护照号：</th>
                            <td >{$tourer['passportno']}</td>
                        </tr>
                        <tr>
                            <th scope="row">身份证号：</th>
                            <td >{$tourer['cardnumber']}</td>
                        </tr>
                    </table>
                </div>
                {/loop}
            {/if}
            
            {if $order['status']==0 || $order['status']==1}
                <div class="canshu alipay bg-white p10 bte3 bbe3 mt10 o-hidden" id="zhifu">
                    <div class="bbe3"><div class="mb10">选择支付方式</div></div>
                    <table class="table table-striped grey m0">
                        {if in_array(8,$order['pay_type'])}
                        <tr id="weixin_btn" data-value="3">
                            <th scope="row" width="20%"><div class="icon"><img src="../../../public/images/icon/chn_wechat.png"></div></th>
                            <td width="80%">
                                <h5 class="m0">微信支付</h5>
                                <p class="grey font12 m0">选择支付方式，免费抽奖iPhone6</p>
                            </td>
                            <td align="right"  width="8%"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                        {if in_array(1,$order['pay_type'])}
                        <tr id="zhifubao" data-value="1">
                            <th scope="row"><div class="icon icon3"><img src="../../../public/images/icon/Alibabai_Alipay.png"></div></th>
                            <td>
                                <h5 class="m0">支付宝支付</h5>
                                <p class="grey font12 m0">推荐有支付宝的用户使用</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                        {if in_array(2,$order['pay_type'])}
                        <tr id="yinlian" data-value="2">
                            <th scope="row"><div class="icon icon2"><img src="../../../public/images/icon/visa.png"></div></th>
                            <td>
                                <h5 class="m0">银联支付</h5>
                                <p class="grey font12 m0">支持各大银行卡喝信用卡网银支付</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        {/if}
                        
                    </table>   
                </div>
            {/if}
            
            <div class="mt10 ml10 mr10">
                <a href="javascript:history.go(-1);">
                <button type="button" class="btn w100 p10 font16 white mt10">
                    返回上一页
                </button>
                </a>
            </div>
        </div>
    </div>
</div>


<form method="post" action="{$cmsurl}page/dopay" id="payfrm">
    <input type="hidden" name="orderid" value="{$order['id']}"/>
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
        });

        if(!isWeiXin())
        {
            $("#weixin_btn").hide();
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
    
     function jsApiCall()
        {
                WeixinJSBridge.invoke(
                        'getBrandWCPayRequest',{$jsApiParameters},
                        function(res){
                                WeixinJSBridge.log(res.err_msg);
                                $.ajax({
                                    type:"post",
                                    url:"{$cmsurl}order/check",
                                    data:{"orderid":{$order['id']}},
                                    dataType:'json',
                                    success: function(data){
                                        if(data.status == '1'){
                                            if(data.ispay==1) {
                                               location.href = '{$cmsurl}user/order_detail/orderid/{$order['id']}';
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
    

</script>

</body>
</html>
