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
<title>确认订单</title>
 {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
 {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">确认订单</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main">
        <form action="{$cmsurl}order/create" method="post" name="form1" id="form1">
         <div class="confirmation-order">
               
              <div class="date-query p10">
                   <div class="date-hd o-hidden text-center white p10">
                         <div class="col-lg-1 p0">
                             <span class="glyphicon pre" id="cpre" aria-hidden="true">&LT;</span>
                         </div>
                         <div class="col-lg-9" id="month">2015年08月</div>
                         <div class="col-lg-1 p0 pull-right">
                             <span class="glyphicon next" id="cnext" aria-hidden="true">&GT;</span>
                         </div>
                   </div>
                   <div class="table-responsive">
                         <table class="table bg-white" id="datalist">
                           
                       </table>
                   </div>
                   
              </div> 
         
              <div class="canshu contact bg-white p10 bte3 bbe3">
                   <table class="table table-striped grey m0">
                        
                        <tr>
                          <th scope="row" style="vertical-align:top">人数：</th>
                          <td align="left">
                            <div class="input-group pull-left" style="width:80px;">
                                <select name="adult" class="form-control font12" id="adult">
                                    <option value="1">成人1</option>
                                    <option value="2">成人2</option>
                                    <option value="3">成人3</option>
                                    <option value="4">成人4</option>
                                    <option value="5">成人5</option>
                                    <option value="6">成人6</option>
                                    <option value="0">成人0</option>
                                </select>
                            </div>
                            <div class="input-group pull-left ml10" style="width:80px;">
                              <select name="child" class="form-control font12" id="child">
                                    <option value="0">儿童0</option>
                                    <option value="1">儿童1</option>
                                    <option value="2">儿童2</option>                                    
                                    <option value="3">儿童3</option>                                    
                                    <option value="4">儿童4</option>                                    
                                    <option value="5">儿童5</option>                                    
                                    <option value="6">儿童6</option>                                    
                                </select>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row" width="20%">姓名：</th>
                          <td align="right"  width="80%"><input type="text" name="linkman" id="linkman" class="form-control" value="" placeholder="请输入姓名"/></td>
                        </tr>
                        <tr>
                          <th scope="row">手机：</th>
                          <td align="right"><input type="tel" class="form-control" name="linktel"  id="linktel" value=""  placeholder="请输入电话"/></td>
                        </tr>
                        <tr>
                          <th scope="row">邮箱：</th>
                          <td align="right"><input type="email" class="form-control" name="linkemail" id="linkemail" placeholder="请输入邮箱"></td>
                        </tr>
                        <tr>
                          <th scope="row" valign="top" style="vertical-align:top">留言：</th>
                          <td align="right"><textarea class="form-control" name="remark" rows="3" placeholder="如果有其它需求请在这里留言给我们哦~"></textarea></td>
                        </tr>
                    </table>    
              </div>
              {if $row['jifentprice'] != 0}
              <div class="discount bg-white p15 bte3 bbe3 mt10 o-hidden">
                   <table class="table m0">
                       <tr>
                          <th scope="row" width="20%" align="right" style="padding:0px;"><strong class="font16 grey">代金卷：</strong></th>
                          <td width="80%">
                                <select name="jifenid" class="form-control selectid" id="jifenid">
                                <option value="0" data-price="0">无</option>
                                {loop $jifeninfo $k}
                                <option value="{$k['id']}" data-price="{$k['jifen']}">{$k['content']},面额{$k['jifen']}元</option>
                                {/loop}
                            </select>
                          </td>
                        </tr>
                        <tr class="discount-info none">
                          <th scope="row" >&nbsp;</th>
                          <td >
                             <div>已减免<strong id="deduct-content" style="color:#F00">0</strong>元,本产品最高可优惠{$row['jifentprice']}元</div>
                          </td>
                        </tr>
                   </table> 
              </div>
              {/if}
              
              <div class="canshu bg-white p15 bte3 bbe3 mt10 o-hidden">
                  <input type="hidden" name="day" id="day" value="" />
                  <input type="hidden" name="price" id="price" value="" />
                  <input type="hidden" name="childprice" id="childprice" value="" />
                  <input type="hidden" name="roombalance" id="roombalance" value="" />
                  <input type="hidden" name="number" id="number" value="" />
                  <input type="hidden" id="ordertype" name="ordertype" value="1" />
                  <input type="hidden" id="suitid" name="suitid" value="{$suitid}" />
                  <input type="hidden" id="id" name="id" value="{$row['lineid']}" />
                  <input type="hidden" id="nextmonth" name="nextmonth" value="0" />
                  <input type="hidden" id="nextyear" name="nextyear" value="0" />
                  <input type="hidden" id="premonth" name="premonth" value="0" />
                  <input type="hidden" id="preyear" name="preyear" value="0" />
                  <input type="hidden" id="needjifen" name="needjifen" value="{$row['jifentprice']}" />
                  <input type="hidden" id="roombalancenum" name="roombalancenum" value="0" />
                    <div class="settle">
                        <div class="pull-left">
                           总计：<span class="price">¥ <em class="font24" id="totalprice">0</em></span>
                           <p class="grey m0 font12" id = "roombalance1">包含单人差：0元</p>
                         </div>
                        <div class="pull-right"><input class="btn white mt10" type="button"  onclick="checkform();" value="去结算" style="padding:6px 25px;"></div>
                    </div>    
              </div>
              
         </div>
        </form>
    </div>
    <div class="mt10">
        <div class="error-message affix">
            <div class="affix font1b p10 white text-center" id="error">错误提示</div>
        </div> 
    </div>
    
</div>

<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
<script>
$(function(){
    var myDate = new Date();
    var year = myDate.getFullYear(); //获取完整的年份(4位,1970-????)
    var month = myDate.getMonth()+1; //获取当前月份(0-11,0代表1月)
    var str = year + '年' + month + '月';
    $('#month').html(str);
   $.ajax({
        type:"post",
        url:"{$cmsurl}lines/rili",
        data:{"suitid":{$suitid}},
        dataType:'json',
        success: function(data){
            if(data.status == '1'){
                $('#datalist').html(data.source);
                if(data.nextmonth) {
                    $("#nextmonth").val(data.nextmonth);
                    $("#nextyear").val(data.nextyear);
                    $("#cnext").html("&gt;");
                    $("#cnext").addClass('next');
                }else{
                    $("#cnext").html("&nbsp;");
                    $("#cnext").removeClass('next');
                }
                if(data.premonth) {
                    $("#premonth").val(data.premonth);
                    $("#preyear").val(data.preyear);
                    $("#cpre").html("&lt;");
                    $("#cpre").addClass('pre');
                }else{
                    $("#cpre").html("&nbsp;");
                    $("#cpre").removeClass('pre');
                }
            }
        }
    });
    
    $(".next").click(function(){
        var nextm = $("#nextmonth").val();
        var nexty = $("#nextyear").val();
        $("#month").html(nexty+"年"+nextm+"月");
        $.ajax({
            type:"post",
            url:"{$cmsurl}lines/rili",
            data:{"suitid":{$suitid},"m":nextm,"y":nexty},
            dataType:'json',
            success: function(data){
                if(data.status == '1'){
                    $('#datalist').html(data.source);
                    if(data.nextmonth) {
                        $("#nextmonth").val(data.nextmonth);
                        $("#nextyear").val(data.nextyear);
                        $("#cnext").html("&gt;");
                        $("#cnext").addClass('next');
                    }else{
                        $("#cnext").html("&nbsp;");
                        $("#cnext").removeClass('next');
                    }
                    if(data.premonth) {
                        $("#premonth").val(data.premonth);
                        $("#preyear").val(data.preyear);
                        $("#cpre").html("&lt;");
                        $("#cpre").addClass('pre');
                    }else{
                        $("#cpre").html("&nbsp;");
                        $("#cpre").removeClass('pre');
                    }
                }
            }
        });
    });
    
    $(".pre").click(function(){
        var prem = $("#premonth").val();
        var prey = $("#preyear").val();
        $("#month").html(prey+"年"+prem+"月");
        $.ajax({
            type:"post",
            url:"{$cmsurl}lines/rili",
            data:{"suitid":{$suitid},"m":prem,"y":prey},
            dataType:'json',
            success: function(data){
                if(data.status == '1'){
                    $('#datalist').html(data.source);
                    if(data.nextmonth) {
                        $("#nextmonth").val(data.nextmonth);
                        $("#nextyear").val(data.nextyear);
                        $("#cnext").html("&gt;");
                        $("#cnext").addClass('next');
                    }else{
                        $("#cnext").html("&nbsp;");
                        $("#cnext").removeClass('next');
                    }
                    if(data.premonth) {
                        $("#premonth").val(data.premonth);
                        $("#preyear").val(data.preyear);
                        $("#cpre").html("&lt;");
                        $("#cpre").addClass('pre');
                    }else{
                        $("#cpre").html("&nbsp;");
                        $("#cpre").removeClass('pre');
                    }
                }
            }
        });
    });
    
    $(document).on("touchend click", ".have", function() {
        $('.have').removeClass('select');
        $(this).addClass('select');
        var price= $(this).attr("data-price");
        var childprice= $(this).attr("data-childprice");
        var roombalance= $(this).attr("data-roombalance");
        var number= $(this).attr("data-number");
        var day= $(this).attr("data-day");
        $('#price').val(price);
        $('#childprice').val(childprice);
        $('#roombalance').val(roombalance);
        $('#number').val(number);
        $('#day').val(day);
        var a= '';
        var b= '';
        if (number<6) {
            if(childprice==0)
            {
                b='<option value="0">儿童0</option>';
            }
            else
            {
                b='<option value="0">儿童0</option>';
                for (var i=1;i<=number;i++) {
                    b+='<option value="'+i+'">儿童'+i+'</option>';
                }
            }
            for (var i=1;i<=number;i++) {
                a+='<option value="'+i+'">成人'+i+'</option>';
            }
            a='<option value="0">成人0</option>'
            $('#adult').html(a);
            $('#child').html(b);
        } 
        else {
            if(childprice == 0)
            {
                $('#child').html('<option value="0">儿童0</option>');
            }
            else
            {
                $('#child').html('<option value="0">儿童0</option><option value="1">儿童1</option><option value="2">儿童2</option><option value="3">儿童3</option><option value="4">儿童4</option><option value="5">儿童5</option><option value="6">儿童6</option>');
            }
            $('#adult').html('<option value="1">成人1</option><option value="2">成人2</option><option value="3">成人3</option><option value="4">成人4</option><option value="5">成人5</option><option value="6">成人6</option><option value="0">成人0</option>');
        }
        getPrice();
    });
    
    $("#adult").change(function(){
          getPrice();
    });
    $("#child").change(function(){
          getPrice();
    });
    $("#jifenid").change(function(){
        var id = $("#jifenid").find("option:selected").val();
        if(id == 0){
            $(".discount-info").addClass("none")
        }else{
            $(".discount-info").removeClass("none")  
        }
        var jifenvalue = $("#jifenid").find("option:selected").attr("data-price");
        var deductprice = Math.min(jifenvalue, {$row['jifentprice']});
        $("#deduct-content").html(deductprice);
    getPrice();
    });
     
 });

    function getPrice() {
        var data_price = $('#price').val();
        var data_childprice = $('#childprice').val();
        var data_roombalance = $('#roombalance').val();
        var adultnum = $('#adult').find("option:selected").attr("value");
        var childnum = $('#child').find("option:selected").attr("value");
        var roombalance=0;
        var price;
        
        if (data_roombalance>0 && adultnum%2==1) {
            roombalance = parseFloat(data_roombalance);
            $("#roombalancenum").val(1);
        }
        else
        {
            $("#roombalancenum").val(0);
        }
        $("#roombalance1").html('包含单人差：'+roombalance+'元');
        var jifenvalue = $("#jifenid").find("option:selected").attr("data-price");
        var deductprice = Math.min(jifenvalue, {$row['jifentprice']});
        price = data_price*adultnum + data_childprice*childnum + roombalance-deductprice;
        if(price <= 0)
            price = 1;
        $("#totalprice").html(price);
    }
    
    //提交订单
    function checkform(){
        var linkman = $("#linkman").val();
        var linktel = $("#linktel").val();
        var linkemail  = $("#linkemail").val();

        if($('#day').val()==0){
          perror('请选择出行日期!');
          return false;
        }
        if(($('#price').val()==0)&&($('#childprice').val()==0)){
          perror('当前产品不能预订!');
          return false;
        }
        if(linkman.length<1){
          perror('请填写联系人!');
          return false;
        }
        if (linktel.length<1) {
             $("#linktel").focus();
             perror("请填写手机");
             return false;
        }
        if (linkemail.length<1) {
             $("#linkemail").focus();
             perror("请填写邮箱");
             return false;
        }

        var regPartton=/1[3-8]+\d{9}/;
        if (!regPartton.test(linktel))
        {
            perror('请输入正确的手机号码');
            return false;
        }
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(linkemail)){
            perror('请输入正确的邮箱');
                    return false;
        }
        $('#form1').submit();
    }        
    
    function perror(msg) {
        $("#error").html(msg);
        $(".error-message").show().delay(2000).hide(0);
    }

</script>
</body>
</html>
