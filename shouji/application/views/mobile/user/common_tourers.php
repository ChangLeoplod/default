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
            <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">常用旅客信息</li>
            <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
        </ul>
    </header>
    
    <div class="main"> 
        <div class="comm-col"> 
            <div id="myTabContent" class="tab-content font12" style="padding:0px;">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="common-passenger p15">
                        <div class="common-passenger-list o-hidden">
                            {if $tourers}
                            <ul>
                                {loop $tourers $tourer}
                                <li class="bg-white p10 mb10 w100 o-hidden">
                                    <div class="pull-left w50 font12 grey">
                                      <span class="font14">{$tourer['name']}</span>
                                      <div>邮&nbsp;&nbsp;&nbsp;&nbsp;箱 : {$tourer['email']}</div>
                                      <div>电&nbsp;&nbsp;&nbsp;&nbsp;话 : {$tourer['mobile']}</div>
                                      <div>护&nbsp;&nbsp;&nbsp;&nbsp;照 : {$tourer['ppno']}</div>
                                      <div>身份证 : {$tourer['idno']}</div>
                                    </div>
                                    <div class="pull-right w50 mt10">
                                        <button type="button" class="btn white pull-right ml10 delete" style="padding: 3px 15px;" data-id="{$tourer['id']}">删除</button>
                                        <a href="{$cmsurl}user/edittourer/tourerid/{$tourer['id']}">
                                            <button id="update" type="button" class="btn bg-green  white pull-right" style="padding: 3px 15px;">修改</button>
                                        </a>
                                    </div>
                                </li>
                                {/loop}
                            </ul>
                            {/if}
                            <div class="grey pull-right font12">最多可保存十条记录</div>
                            <input type="hidden" id="count" name="count" value="{if $count}{$count}{/if}">
                        </div>
                        <div class="pb10 o-hidden pt10 mt10">
                            <button id="add" type="button" class="btn bg-green white w100 font16">新增</button>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="mt10">
                <div class="error-message affix modal" id="myModal">
                    <div class="affix font12 p10 white text-center" id="error">新增用户成功</div>
                </div> 
            </div>
        </div>
    </div>
</div>
    
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

<script>
    $("#add").click(function(){
        var count = $("#count").val();
        if(count<10)
        {
            location.href="{$cmsurl}user/addtourer";
        }
        else
        {
            perror("只能添加10位常用联系人");
            return false;
        }
    });

    $(".delete").click(function(){
        var tourerid = $(this).attr("data-id");
        $.ajax({
            type:"post",
            url:"{$cmsurl}user/deletetourer",
            data:{"tourerid":tourerid},
            dataType:'json',
            success:function(data){
                perror(data.msg);
                if(data.status)
                {
                    setTimeout("location.href='{$cmsurl}user/commontourers';",700);
                }
            }
        });
    });
    
    function perror(msg) {
        $("#error").html(msg);
        $('#myModal').modal('show');
    }
</script>

</body>
</html>
