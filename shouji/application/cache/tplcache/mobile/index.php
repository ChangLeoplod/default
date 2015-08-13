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
<title><?php echo $seotitle;?>-<?php echo $webname;?></title>
 <?php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); ?>
 <?php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); ?>
</head>
<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">首页</li>
         <li class="pull-right li3"><a href="<?php echo $cmsurl;?>user/index" class="baseicon block pull-right member"></a><a href="<?php echo $cmsurl;?>user/orderlist" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main">
        <div class="slider">
              <ul class="m0 p0">
                <?php $line_tag = new Taglib_Line();if (method_exists($line_tag, 'getline')) {$data = $line_tag->getline(array('action'=>'getline','row'=>'10','flag'=>'attribute','attrid'=>'162',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $k => $v) { ?>
                    <li><a href="<?php echo $v['url'];?>" ><img src="<?php echo $v['mobilepic'];?>" alt="<?php echo $v['linename'];?>"></a></li>
                    <?php $n++;}unset($n); } ?>
                
              </ul>
        </div>
        <script>
          $(".slider").yxMobileSlider({width:640,height:320,during:5000})
        </script>
        <div class="bg-white p15 recommend o-hidden bbe3">
            <ul class="m0 p0 text-center">
               <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
               <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
               <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
               <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
            </ul>
        </div>
        
        <div class="select-one p10 bte3 bbe3 mt10 bg-white o-hidden">
             <div class="panel-title posr p5">
                <h2 class="m0 font16">精选海岛一日游</h2>
                <p class="font12 grey mt5">这些产品性价比奇高，异常火爆，卖完即止。</p>
                <div class="more posa baseicon"></div>
             </div>  
             <ul class="m0 p0">
                <?php $line_tag = new Taglib_Line();if (method_exists($line_tag, 'getline')) {$data = $line_tag->getline(array('action'=>'getline','row'=>'10','flag'=>'attribute','attrid'=>'162',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $k => $v) { ?>
                 <li class="pull-left w50 p5 posr">
                     <a href="<?php echo $v['url'];?>"><img src="<?php echo $v['mobilepic'];?>"></a>
                   <div class="text posa white o-hidden">
                      <h3 class=" m0 font14 bold white-nowrap"><?php echo $v['linetitle'];?></h3>
                      <p class=" font12 white-nowrap"><?php echo $v['linesubtitle'];?></p>
                      <span class="font14">&yen;<?php echo $v['lineprice'];?>/人</span>
                   </div>
                 </li>
                <?php $n++;}unset($n); } ?>
                
             </ul> 
               
        </div>
        
        
        
        
        <div class="select-we p15 bte3 bbe3 mt10 bg-white o-hidden"> 
             <h4 class="bold text-center"><span class="bg-white">为什么选择我们</span></h4>
             <ul class="m0 p0 we o-hidden">
                <li class="w33 pull-left">
                    <div class="icon">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center">
                        <h5 class="font12">一站式自由行服务</h5>
                        <p class="font10 grey">机票、酒店、签证、攻略、目的地安排，都为您搞定！</p>
                    </div>
                </li>
                <li class="w33 pull-left">
                    <div class="icon icon1">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center ">
                        <h5 class="font12">一站式自由行服务</h5>
                        <p class="font10 grey">机票、酒店、签证、攻略、目的地安排，都为您搞定！</p>
                    </div>
                </li>
                <li class="w33 pull-left">
                    <div class="icon icon2">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center ">
                        <h5 class="font12">一站式自由行服务</h5>
                        <p class="font10 grey">机票、酒店、签证、攻略、目的地安排，都为您搞定！</p>
                    </div>
                </li>
             </ul>
             
             <ul class="m0 p0 hot-link o-hidden text-center">
                 <li class="pull-left w33"><div><i class="baseicon"></i>我的订单</div></li>
                 <li class="pull-left w33"><div><i class="baseicon i1"></i>帮助中心</div></li>
                 <li class="pull-left w33"><div><i class="baseicon i2"></i>选择我们</div></li>
                 <li class="pull-left w33"><div><i class="baseicon i3"></i>会员中心</div></li>
                 <li class="pull-left w33"><div><i class="baseicon i4"></i>联系我们</div></li>
                 <li class="pull-left w33"><div><i class="baseicon i5"></i>加入我们</div></li>
             </ul>
             
        </div>
        
        
        
    </div>
 
    
</div>
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
</body>
</html>
