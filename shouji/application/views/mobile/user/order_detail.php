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
                            <td ><span class="orange mr10">待支付生效</span>倒计时：29分56秒</td>
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
                <div class="canshu alipay bg-white p10 bte3 bbe3 mt10 o-hidden">
                    <div class="bbe3"><div class="mb10">选择支付方式</div></div>
                    <table class="table table-striped grey m0">
                        <tr>
                            <th scope="row" width="20%"><div class="icon"><img src="../../../public/images/icon/chn_wechat.png"></div></th>
                            <td width="80%">
                                <h5 class="m0">微信支付</h5>
                                <p class="grey font12 m0">选择支付方式，免费抽奖iPhone6</p>
                            </td>
                            <td align="right"  width="8%"><i class="more-right"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"><div class="icon icon3"><img src="../../../public/images/icon/Alibabai_Alipay.png"></div></th>
                            <td>
                                <h5 class="m0">支付宝支付</h5>
                                <p class="grey font12 m0">推荐有支付宝的用户使用</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"><div class="icon icon2"><img src="../../../public/images/icon/visa.png"></div></th>
                            <td>
                                <h5 class="m0">银联支付</h5>
                                <p class="grey font12 m0">支持各大银行卡喝信用卡网银支付</p>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
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
    
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
</body>
</html>
