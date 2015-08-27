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
<title>超级自由行 - {$webname}</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">超级自由行</li>
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
                        <li><a href="?dest_id=0&p={$p}&d={$d}">全部</a></li>
                        {loop $dest $v}
                            <li><a href="?dest_id={$v['id']}&p={$p}&d={$d}">{$v['kindname']}</a></li>
                        {/loop}
                    </ul>
                </div>
                
                 <div class="btn-group col-lg-4 p0">
                    <button class="btn btn-default btn-sm dropdown-toggle bg-white w100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {if $d==1}
                            4天
                        {elseif $d==2}
                            5天
                        {elseif $d==3}
                            6天
                        {elseif $d==4}
                            7天
                        {elseif $d==5}
                            8天
                        {elseif !$d}
                            行程天数
                        {/if}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=0">全部</a></li>
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=1">4天</a></li>
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=2">5天</a></li>
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=3">6天</a></li>
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=4">7天</a></li>
                        <li><a href="?dest_id={$dest_id}&p={$p}&d=5">8天</a></li>
                    </ul>
                 </div>
                 
                <div class="btn-group col-lg-4 p0">
                    <button class="btn btn-default btn-sm dropdown-toggle bg-white w100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {if $p==1}
                            ￥1000-3000
                        {elseif $p==2}
                            ￥3000-5000
                        {elseif $p==3}
                            ￥5000-10000
                        {elseif $p==4}
                            ￥10000-20000
                        {elseif !$p}
                            价格区间
                        {/if}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="?dest_id={$dest_id}&p=0&d={$d}">全部</a></li>
                        <li><a href="?dest_id={$dest_id}&p=1&d={$d}">￥1000-3000</a></li>
                        <li><a href="?dest_id={$dest_id}&p=2&d={$d}">￥3000-5000</a></li>
                        <li><a href="?dest_id={$dest_id}&p=3&d={$d}">￥5000-10000</a></li>
                        <li><a href="?dest_id={$dest_id}&p=4&d={$d}">￥10000-20000</a></li>
                    </ul>
                 </div>
                 
                <div style="height:1px; clear:both"></div>
            </div>
            <div class="content" id="package_list">
                {if !$list}
                <center>暂时还没有您所选条件的套餐，请选择其它~</center>
                {/if}
                <ul>
                    {loop $list $v}
                    <a href="{$cmsurl}lines/show/id/{$v['id']}">
                        <li class="posr mt10">
                            <img src="{$v['mobilepic']}">
                            <div class="text posa white o-hidden">
                                <div class="posa o-hidden">
                                    <span class="font14">{$v['linename']}</span>
                                    <h3 class=" m0 font14 bold white-nowrap"><span>&yen;<em class="font18">{$v['lineprice']}</em>元/起</span></h3>  
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
<input type="hidden" id="destid" value="{$dest_id}"/>
<input type="hidden" id="dayrange" value="{$d}"/>
<input type="hidden" id="pricerange" value="{$p}"/>

<script type="text/javascript">
var loading = false;
var endpage=1024;
$(function(){
    $('body').append('<input type="hidden" id="page" value="1"/>');
    $(window).scroll(function(){
        var page = parseInt($("#page").val())+1;
        var scrollTop = $(this).scrollTop();               //滚动条距离顶部的高度
        var scrollHeight = $(document).height();           //当前页面的总高度
        var windowHeight = $(this).height();               //当前可视的页面高度
        var bot = 50;
        if(page<endpage)
        {
            if(bot + scrollTop + windowHeight >= scrollHeight)  {    //距离顶部+当前高度 >=文档总高度 即代表滑动到底部
                if(!loading)
                {
                    loading = true;
                    var id = $("#destid").val();
                    var d = $("#dayrange").val();
                    var p = $("#pricerange").val();
                    var SITEURL = '{$cmsurl}';
                    var url='/lines/packages/?id='+id+'&p='+p+'&d='+d+'&action=ajaxline&page='+page+'&endpage'+endpage;
                    $.get(url,function(results){
                        eval('results='+results);
                        if(results.length==0)
                        {
                            endpage=page;
                        }
                        var html='';
                        for(a in results){
                            html+='<a href="'+SITEURL+'lines/show/id/'+results[a]['id']+'">';
                            html+='<li class="posr mt10">';
                                html+='<img src="'+results[a]['mobilepic']+'">';
                                html+='<div class="text posa white o-hidden">';
                                    html+='<div class="posa o-hidden">';
                                        html+='<span class="font14">'+results[a]['linename']+'</span>';
                                        html+='<h3 class=" m0 font14 bold white-nowrap">';
                                                                            html+='<span>&yen;<em class="font18">'+results[a]['lineprice']+'</em>元/起</span>';
                                                                            html+='</h3>'; 
                                    html+='</div>';
                                html+='</div>';
                            html+='</li>';
                            html+='</a>';
                        }
                        $("#page").val(page);
                        $('#package_list').append(html);
                    }).done(function(){
                        loading=false;
                    });
                }
            }
        }
    });
});
</script>

</html>
