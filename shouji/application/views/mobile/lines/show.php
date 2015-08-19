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
<title>{$row['linename']} - {$webname}</title>
 {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
 {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">产品详情</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}index" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main"> 
         <div class="commodity-page">
              <div class="ginto"><img src="{$row['mobilepic']}"></div>
              
              <div class="comm-name bg-white bbe3 p15"> 
                 <h5 class="font16 m0">{$row['linename']}</h5>
                 <div class="mt10 price"><span>&yen;<em class="font20">{$row['lineprice']}</em>起</span><i class="font12 grey ml10">自订价：{$row['storeprice']}元</i></div>
              </div>
              {if strpos('s'.$row['attrid'].',','156,')}
              <input type="hidden" name="suitid" id="suitid" value="{$suit[0]['id']}"/>
              {else}
              <div class="comm-col mt10 bg-white bte3 bbe3 p10"> 
                   <div class="panel-title p5">
                        <h2 class="m0 font16">选择套餐</h2>
                    </div>
                    <ul class="o-hidden mt5 text-center font12">
                        {loop $suit $v}
                        <li class="w50 pull-left {if $n==1}active{/if} choose" style="cursor:pointer" data-id="{$v['id']}"><div class="p5"><div>{$v['suitname']}</div></div></li>
                        {if $n==1}<input type="hidden" name="suitid" id="suitid" value="{$v['id']}"/>{/if}
                        {/loop}
                        
                    </ul>
              </div>
              {/if}
              <div class="comm-col mt10 bg-white bte3 bbe3 p10"> 
                   <div class="panel-title p5">
                        <h2 class="m0 font16">产品亮点</h2>
                    </div>
                    <ul class="o-hidden font12 grey p15">
                        {$row['features']}
                    </ul>
              </div>
              
              <div class="comm-col mt10 bg-white bte3 bbe3 p15 mb10">
                    <ul id="myTab" class="nav nav-tabs font12 text-center">
                       {loop $linedisc $v}
                       <li class="w25 {if $n==1}active{/if}"><a href="#tab{$n}" class="grey" data-toggle="tab">{$v['chinesename']}</a></li>
                       {/loop}
                    </ul>
                    <div id="myTabContent" class="tab-content font12">
                        {loop $linedisc $v}
                       <div class="tab-pane fade {if $n==1}in active{/if}" id="tab{$n}">
                           {$row[$v['columnname']]}
                       </div>
                       {/loop}
                    </div>
                    
                    
              </div>
              
              <div class="mt10 affix" style="left:0px; bottom:0px; right:0px; z-index:1">
                 <button type="button" id="sumbit" class="btn w100 p10 font16 white mt10" style=" border-radius:0px;">
                    立即购买
                  </button>
              </div>
              
         </div> 
    </div>
 
    
</div>
<script>
$(function(){
    $('.choose').click(function(){
        var id = $(this).attr('data-id');
        $('#suitid').val(id);
        $('.choose').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#sumbit').click(function(){
        var id = $('#suitid').val();
         location.href="{$cmsurl}lines/create/id/"+id;
    });
    
    
});     
        
</script>
<div class="footer grey font12 text-center" >武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

</body>
</html>
