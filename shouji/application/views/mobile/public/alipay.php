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
<title>支付宝付款 - {$webname}</title>
 {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
 {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
</head>

<body>
    
  <div class="main"> 
       <div class="alipay-pay">
            <div class="prompt p10 o-hidden white posr text-center">
               请点击右上角，选择在浏览器打开完成支付
               <i class="pull-right block posa"></i>
           </div>
           
           <div class="pay grey text-center">
               <div class="mt10 mb10">订单号：{$info['ordersn']}</div>
               <div class="mt10">总计金额：<span class="orange mr10">¥<em class="font20">{$totalprice}</em></span></div>
           </div>
           
          <div class="ml10 mr10">
               <button type="button" class="pay btn w100 p10 font16 white mt10" data-toggle="modal" id="check">
                  我已完成支付宝支付
                </button>
                
                
                 <!--弹框开始-->
                 <div class="modal fade" id="myModal" >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header text-center bg-green white p10">
                          <h4 class="modal-title" id="myModalLabel">提示</h4>
                        </div>
                        <div class="modal-body">
                           恭喜你！支付成功！
                        </div>
                        <div class="modal-footer p10" style="text-align:center;">
                          <button type="button" class="btn btn-default white" id="ucheck" data-dismiss="modal" style="padding:8px 25px;">确&nbsp;定</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 <!--弹框结束-->
          </div>                       
       </div>
    </div>
 
    
</div>

<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
<script>
$(function(){
    $('#ref').click(function(){
        location.reload();
    });
    $('#check').click(function(){
        $.ajax({
            type:"post",
            url:"{$cmsurl}order/check",
            data:{"orderid":{$orderid}},
            dataType:'json',
            success: function(data){
                if(data.status==2){
                    if(data.ispay==1) {
                        $('.modal-body').html('恭喜你！支付成功！<input type="hidden" id="ispay" value="1" />');
                    } else{
                        $('.modal-body').html('还没完成支付，请再次支付喔~');
                    }
                    $('#myModal').modal('show');
                }
            }
        });
        
    });
    $('#ucheck').click(function(){
        var ispay = $('#ispay').val();
        if (ispay==1) {
            location.href="{$cmsurl}user/order_detail/orderid/{$orderid}";
        }
         
    });
    
});
</script>
</body>
</html>
