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
<title>{$webname}</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">目的地服务</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main"> 
        <div class="column-page">
            <div class="hot bg-white bbe3 grey text-center font12 posr">
                <div class="btn-group col-lg-4 p0">
                    <button class="btn btn-default btn-sm dropdown-toggle bg-white w100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {loop $dest $v}
                        {if $dest_id==$v['id']}
                            {$v['kindname']}
                        {/if}
                    {/loop}
                    {if !$dest_id}
                        目的地
                    {/if}
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="?dest_id=0&p={$p}&attr_id={$attr_id}">全部</a></li>
                        {loop $dest $v}
                            <li><a href="?dest_id={$v['id']}&p={$p}&attr_id={$attr_id}">{$v['kindname']}</a></li>
                        {/loop}
                    </ul>
                </div>
                
                <div class="btn-group col-lg-4 p0">
                    <button class="btn btn-default btn-sm dropdown-toggle bg-white w100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {loop $attr $v}
                        {if $attr_id==$v['id']}
                            {$v['attrname']}
                        {/if}
                    {/loop}
                    {if !$attr_id}
                        当地玩法
                    {/if}
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="?dest_id={$dest_id}&p={$p}&attr_id=0">全部</a></li>
                        {loop $attr $v}
                            <li><a href="?dest_id={$dest_id}&p={$p}&attr_id={$v['id']}">{$v['attrname']}</a></li>
                        {/loop}
                    </ul>
                </div>
                 
                <div class="btn-group col-lg-4 p0">
                   <button class="btn btn-default btn-sm dropdown-toggle bg-white w100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {if $p==1}
                        ￥100-300
                    {elseif $p==2}
                        ￥300-500
                    {elseif $p==3}
                        ￥500-1000
                    {elseif $p==4}
                        ￥1000-2000
                    {elseif !$p}
                        价格区间
                    {/if}
                    <span class="caret"></span>
                   </button>
                   <ul class="dropdown-menu">
                       <li><a href="?dest_id={$dest_id}&p=0&attr_id={$attr_id}">全部</a></li>
                       <li><a href="?dest_id={$dest_id}&p=1&attr_id={$attr_id}">￥100-300</a></li>
                       <li><a href="?dest_id={$dest_id}&p=2&attr_id={$attr_id}">￥300-500</a></li>
                       <li><a href="?dest_id={$dest_id}&p=3&attr_id={$attr_id}">￥500-1000</a></li>
                       <li><a href="?dest_id={$dest_id}&p=4&attr_id={$attr_id}">￥1000-2000</a></li>
                   </ul>
                 </div>
                 
                <div style="height:1px; clear:both"></div>
            </div>
            <div class="content" id="package_list">
                <ul>
                {loop $list $v}
                    <a href="{$cmsurl}lines/show/id/{$v['id']}">
                    <li class="posr mt10">
                        <img src="{$v['mobilepic']}">
                        <div class="text posa white o-hidden">
                            <div class="posa o-hidden">
                                <span class="font14">{$v['lineprice']}</span>
                                <h3 class=" m0 font14 bold white-nowrap">{$v['linetitle']}</h3>  
                            </div>
                        </div>
                    </li>
                    </a>
                {/loop}
                </ul>
            </div>
        </div> 
    </div>
 
    
</div>

<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

</body>
<input type="hidden" id="page" value="1"/>
<input type="hidden" id="destid" value="{$dest_id}"/>
<input type="hidden" id="attrid" value="{$attr_id}"/>
<input type="hidden" id="pricerange" value="{$p}"/>

<script type="text/javascript">
var loading = false;
$(function(){
    $(window).scroll(function(){
        var scrollTop = $(this).scrollTop();               //滚动条距离顶部的高度
        var scrollHeight = $(document).height();           //当前页面的总高度
        var windowHeight = $(this).height();               //当前可视的页面高度
        var bot = 50;
        if(bot + scrollTop + windowHeight >= scrollHeight)  {    //距离顶部+当前高度 >=文档总高度 即代表滑动到底部
            if(!loading)
            {
                loading = true;
                var page = parseInt($("#page").val())+1;
                var dest_id = $("#destid").val();
                var attr_id = $("#attrid").val();
                var p = $("#pricerange").val();
                var SITEURL = {$cmsurl};
                var url='/shouji/lines/daytrips/?dest_id='+dest_id+'&p='+p+'&attr_id='+attr_id+'&action=ajaxline&page='+page;
                $.get(url,function(results){
                    eval('results='+results);
                    var html='';
                    for(a in results){
                        html+='<a href="'+SITEURL+'lines/show/id/'+results[a]['id']+'">';
                        html+='<li class="posr mt10">';
                            html+='<img src="'+results[a]['mobilepic']+'">';
                            html+='<div class="text posa white o-hidden">';
                                html+='<div class="posa o-hidden">';
                                    html+='<span class="font14">'+results[a]['lineprice']+'</span>';
                                    html+='<h3 class=" m0 font14 bold white-nowrap">'+results[a]['linetitle']+'</h3>';  
                                html+='</div>'
                            html+='</div>'
                        html+='</li>'
                        html+='</a>';
                    }
                    $("#page").val(page);
                    $('#package_list').append(html);
                }).done(function(){
                    loading = false;
                });
            }
        }
    });
});
</script>

</html>