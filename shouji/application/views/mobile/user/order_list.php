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
<title>我的订单</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">我的订单</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    <div class="main"> 
        <div class="my-order" id="order_list">
        {if !$orderlist}
        <center>亲，还没有订单哦，赶紧去下单吧~</center>
        {/if}
        
        {loop $orderlist $order}
            <div class="order-col bg-white bte3 bbe3 p15 mt10">
                <div class="modal-title o-hidden bbe3">
                    <span class="pull-left mb10 grey">订单编号：{$order['ordersn']}</span>
                    <em class="pull-right grey mb10">
                        {if $order['status']==0 || $order['status']==1}
                        <a href="{$cmsurl}user/order_detail/orderid/{$order['id']}">待支付</a>
                        {elseif $order['status']==2} 
                            已支付
                        {elseif $order['status']==3}
                            已失效
                        {elseif $order['status']==4}
                            已退款
                        {/if}
                    </em>
                </div>
                <a href="{$cmsurl}user/order_detail/orderid/{$order['id']}" >
                    <div class="content o-hidden bbe3 posr">

                        <div class="pic pull-left posa"><img src="{$order['mobilepic']}"></div>
                        <div class="name pull-left o-hidden">
                            <h5 class="m0 mt10 font16">{$order['productname']}</h5>
                            <p class="grey font12 mt5 o-hidden">{$order['suitname']}</p>
                        </div>

                    </div>
                </a>
                <div class="info o-hidden mt10">
                    <span class="pull-left grey">使用日期：{$order['usedate']}</span>
                    <div class="pull-right grey"><span class="orange">¥<em class="font18">{$order['totalprice']}</em></span></div>
                </div>
            </div>
        {/loop}
        </div>
    </div>
</div>
    
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

<input type="hidden" id="page" value="1"/>
<script>
var loading=false;
$(function(){
    $(window).scroll(function(){
        var bot = 50;
        var scrollTop = $(this).scrollTop();                 //滚动条距离顶部的高度
        var scrollHeight = $(document).height();                //当前页面的总高度
        var windowHeight = $(this).height();                 //当前可视的页面高度
        var SITEURL = '{$cmsurl}';
        if(bot + scrollTop + windowHeight >= scrollHeight)  {    //距离顶部+当前高度 >=文档总高度 即代表滑动到底部
            if(!loading)
            {
                loading=true;
                var page = parseInt($("#page").val())+1;
                $.ajax({
                    type:'POST',
                    data:"page="+page,
                    url:'{$cmsurl}user/ajax_order_more',
                    dataType:'json',
                    success:function(data){
                        if(data.status=='success'){
                            var html = '';
                            $.each(data.orderlist,function(i,row){
                                html+='<div class="order-col bg-white bte3 bbe3 p15 mt10">';
                                    html+='<div class="modal-title o-hidden bbe3">';
                                        html+='<span class="pull-left mb10 grey">订单编号：'+row.ordersn+'</span>';
                                        html+='<em class="pull-right grey mb10">'
                                        if(row.status==0 || row.status==1){
                                            html+='<a href="'+SITEURL+'user/order_detail/orderid/'+row.id+'">待支付</a>';
                                        }
                                        else if(row.status == 2)
                                        {
                                            html+='已支付';
                                        }
                                        else if(row.status == 3)
                                        {
                                            html+='已失效';
                                        }
                                        else if(row.status == 4)
                                        {
                                            html+='已退款';
                                        }
                                        html+='</em>';
                                    html+='</div>';

                                    html+='<a href="'+SITEURL+'user/order_detail/orderid/'+row.id+'" >';
                                    html+='<div class="content o-hidden bbe3 posr">';
                                        html+='<div class="pic pull-left posa"><img src="'+row.mobilepic+'"></div>';
                                        html+='<div class="name pull-left o-hidden">';
                                            html+='<h5 class="m0 mt10 font16">'+row.productname+'</h5>';
                                            html+='<p class="grey font12 mt5 o-hidden">'+row.suitname+'</p>';
                                        html+='</div>';
                                    html+='</div>';
                                    html+='</a>';

                                    html+='<div class="info o-hidden mt10">';
                                        html+='<span class="pull-left grey">使用日期：'+row.usedate+'</span>';
                                        html+='<div class="pull-right grey"><span class="orange">¥<em class="font18">'+row.totalprice+'</em></span></div>'
                                    html+='</div>';
                                html+='</div>';
                            })
                            $("#page").val(page);
                            $("#order_list").append(html);
                        }
                    }
                }).done(function(){
                    loading = false;
                })
            }
        }
    })
})

</script>

</body>
</html>
